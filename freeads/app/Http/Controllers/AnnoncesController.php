<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
Use App\Annonces;
Use App\User;
use Storage;

class AnnoncesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view(' annonces.index');

    }

    public function list()
    {
     
        $annonces= Annonces::all();
        // dd($annonces);
        return view('annonces.annonces', [
            'annonces' => $annonces, 
            ]);
    }

    public function mesannonces($id)
    {
        $users = User::find($id);
        return view('annonces.mes_annonces',[
            'users' => $users,
        ]);
    }

    public function show($id)
    {
        $annonce = Annonces::where('id',$id)->firstOrFail();
        return view('annonces.show',[
            'annonce' => $annonce,
        ]);
    }

    public function edit($id)
    {
        $annonce = Annonces::find($id);
        return view('annonces.edit',[
            'annonce'=> $annonce]);
    }

    public function update(Request $request,$id) 
    {
        $request->validate([
            'title'=>'required',
            'content'=> 'required',
            'price' => 'required',
            'categorie'=>'required',
            'images'=> 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]); 
        $data= array();

        if(request()->hasfile('images')){
            

           foreach($request->file('images') as $image) {
           
               $name=$image->getClientOriginalName();
               $image->move(public_path().'/images/', $name);  
               $data[] = $name;  
              
           }
        }

        $annonce = Annonces::find($id);
        $annonce->title = $request->title;
        $annonce->content = $request->content;
        $annonce->price = $request->price;
        $annonce->categorie= $request->categorie;
        $annonce->image=json_encode($data);

        $annonce->update();
        return redirect()->route('annonces.list');
    }

    public function destroy($id)
    {
        $annonce = Annonces::find($id);
        $annonce->delete();
        // return view('annonces.mes_annonces');
        return redirect()->route('home');

    }

    public function create()
    {
        return view('annonces.create');
    }

    public function store(Request $request)
    {
       
        // $annonce = Annonces::create($this->validateRequest());
      
            // $path=[];    
            // $url=[];   
            //  if(request()->hasfile('images'))
            // {

            //     foreach($request->file('images') as $image){
            //         echo $image;
            //         $name=$image->getClientOriginalName();
            //         $path[] = Storage::putFile('public/images',$request->file('images'));
                
            //     // $uploaded[] = Storage::put('public/images'.$name, file_get_contents($image->getRealPath()));
            //     }
            //     foreach($path as $data){
            //         $url[] = Storage::url($data);
            //     }
            
            // }
        
        $annonce= new Annonces;
        $data= array();
        request()->validate([
            'title'=>'required|min:3',
            'content'=>'required',
            'price'=>'required',
            'categorie'=>'required',
            'images'=> 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
       
       
        if(request()->hasfile('images'))
        {

           foreach($request->file('images') as $image)
           {
               $name=$image->getClientOriginalName();
               $image->move(public_path().'/images/', $name);  
               $data[] = $name;  
           }
        }

        $annonce->title = request('title');
        $annonce->content = request('content');
        $annonce->price = request('price');
        $annonce->categorie = request('categorie');
        $annonce->user_id = Auth::user()->id;
        // $annonce->image=json_encode($url);
        $annonce->image=json_encode($data);

        $annonce->save();
        return redirect()->route('annonces.list',['image'=>'$image']);
    }


    private function validateRequest()
    {
        // $user_id = Auth::id();

        return tap(request()->validate([
            'title'=>'required|min:3',
            'content'=>'required',
            'price'=>'required',
            
            ]), function() {

            if(request()->hasFile('image')) {
               

                request()->validate([
                    'image'=>'file|image|max:5000',
                ]);

            }

        });

    }

    public function search(){
        // $annonce = Annonces::all();
    
        $search = \Request::get('search');
        $price_min = \Request::get('pricemin');
        $price_max = \Request::get('pricemax');
       
       

        if(\Request::get ( 'order' ) != ""){
            $order = \Request::get ( 'order' );
        }else{
                $order = "title";
        }
       

        if($search === ""){
            $annonce = Annonces::WhereBetween('price', [intval($price_min), intval($price_max)])->orderBy($order,'asc')->paginate(5);
            
        }
        else {
            $annonce = Annonces::WhereBetween('price', [intval($price_min), intval($price_max)])->where(function($q) use ($search){
                

                $q->where('categorie', 'LIKE', $search)->orWhere( 'title', 'LIKE', '%' . $search . '%' )->orWhere ( 'content', 'LIKE', '%' . $search . '%' );
            })->orderBy($order,'asc')->paginate(20);
            


        }
        
        // $annonce = Annonces::where( 'title', 'LIKE', '%' . $search . '%' )->orWhere ( 'content', 'LIKE', '%' . $search . '%' )->whereBetween('price', [$price_min, $price_max])->orderBy($order,'desc')->paginate(20);
        
        
          
            return view('annonces.search',compact('annonce'));
       
    
    
    
    }
}

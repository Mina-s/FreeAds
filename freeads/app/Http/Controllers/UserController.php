<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
Use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        return view('users.index');
                
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', ["user"=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if($user->id != Auth::id())
        {
            return redirect('/');
        }
        else
        {
            return view('users.edit', ["user" => $user]);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $message = "Votre profile a était mis a jour";

        if(!empty($request->new_password) && !empty($request->conf_password))
        {
            if($request->new_password === $request->conf_password)
            {
                $hash = Hash::make($request->new_password);
                $user->password = $hash;
                $message = "Votre mot de passe a était mis a jour";
            }
            else
            {
                $message = " Mot de passe different";
                echo $message;
                return view('users.edit', ["user" => $user , 'message' => $message]);
                
            }
        }
        $user->save();
        return view('users.show', ["user" => $user , 'message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/')->with('success','Compte supprimer');

    }
}

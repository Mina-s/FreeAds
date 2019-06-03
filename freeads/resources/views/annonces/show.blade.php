@extends('layouts.app')

@section('content')
    
    <div class="row">
        <div class="col-md-12">
        <br>
        <div class="card">
             <div class="card-header">
                <h2>{{$annonce->title}}<h2> 
                <p> Prix:{{$annonce->price}} </p> 
            </div>
            <div class="card-body">    
                    
                <div class="col-md-6">
                @foreach(json_decode($annonce->image) as $image)
                <div class="col-md-12">
                    <img src="{{asset('images/'.$image)}}" class="card-img-top">
                    </div >
                @endforeach
                <p> {{$annonce->content}} </p>   
                <p class="lead">Vendeur :{{$annonce->user->name}}<p>
                <p class="lead">Posté :{{$annonce->created_at}}</p>
                </div>
                
                <hr>
               
                
            </div>
            </div> 

        
        </div> 
    </div>
@endsection  

       
@extends('layouts.app')
@section('title','Mes Annonces')
    


@section('content')
        <br>
        <br>
        <br>
    <h1> Mes Annonces</h1>
    <h2> {{$users->name}}</h2>

    <div class="row">

        @foreach ($users->annonces as $annonces)
                
       
                <div class="col-md-6">
                <br>
                <br>
                <br>
                        <div class="card">
                            <div class="card-header">
                                <a href="{{route('annonces.show',['id'=> $annonces->id])}}">{{$annonces->title}}</a>
                            
                            </div>
                            <div class="card-body">
                            @if(!empty($annonces->image))
                        
                                @foreach(json_decode($annonces->image) as $image)
                                <div class="col-md-12">
                        
                                        <img src="{{asset('images/'.$image)}}" class="card-img-top">
                                    
                                </div>
                                @endforeach
                                @endif
                            </div>
                            
                            <hr>
                
                            
                            <p class="lead"> {{$annonces->content}} </p>
                            <p> Prix:{{$annonces->price}} </p>
                            <p class="lead">Vendeur :{{$annonces->user->name}}<p>
                            <p>Posté :{{$annonces->created_at}}</p>
                            
                        </div> 
                        <hr>
                            <a href="{{route('annonces.edit',['id'=> $annonces->id])}}" class="btn btn-outline-info">Modifier</a> 
                            <a href="{{route('annonces.list')}}" class="btn btn-outline-secondary">Retour</a>

                            <form action="{{route('annonces.destroy',['id'=> $annonces->id])}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger" >Supprimer</button>
                            </form>   
                </div>

        @endforeach
    </div>
       
@endsection
@extends('layouts.app')
@section('title','Annonces List')
    


@section('content')
        <br>
        <br>
        <br>
    <h1>Annonces</h1>
    <div class="row">

        @foreach ($annonces as $annonces)

        <div class="col-md-12">
        <br>
        <br>
        <br>
            <div class="card">
                <div class="card-header">
                    <a href="{{route('annonces.show',['id'=> $annonces->id])}}">{{$annonces->title}}</a>
                 
                </div>
             </div class="card-body">

                        <div class="col-md-12">
                            <div class="media services-wrap wow fadeInDown">
                            @foreach(json_decode($annonces->image) as $image)
                                <img src="{{asset('images/'.$image)}}" width=300>
                              
                             @endforeach
                            </div>
                        </div>                                          
            
            <hr>
            
                <p class="lead"> {{$annonces->content}} </p>
                <p> Prix:{{$annonces->price}} </p>
                <p class="lead">Vendeur :{{$annonces->user->name}}<p>
                <p>Posté :{{$annonces->created_at}}</p>

              
            </div> 
            
            @endforeach 
        </div>
       
       

       
    </div>
  




@endsection
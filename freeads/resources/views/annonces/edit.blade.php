@extends('layouts.app')
@section('title','Edit annonce')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Annonces</h2>
        </div>
    </div>
</div>

<form action="{{route('annonces.update',['annonce'=> $annonce->id])}}" method="POST" enctype="multipart/form-data">
{{csrf_field()}}
    <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" name="title" value="{{$annonce->title}}" class="form-control">
    </div>
    <select id="pet-select" name="categorie" >
        <option value="{{$annonce->categorie}}" name="categorie">Catégorie</option>
        <option value="Vêtement" name="categorie">Vêtement</option>
        <option value="Véhicule" name="categorie">Véhicule</option>
        <option value="Maison" name="categorie">Maison</option>
        <option value="Jardin" name="categorie">Jardin</option>
        <option value="Fleurs" name="categorie">Fleurs</option>
    </select><br><br><br>

    <div class="form-group">
        <label for="title">Content</label>
        <textarea name="content" row="10" class="form-control" value="{{$annonce->content}}">{{$annonce->content}}</textarea>
    </div>
    <div class="form-group">
        <label for="price">Prix</label>
        <input type="text" name="price" class="form-control" value="{{$annonce->price}}">
    </div>


    <div class="form-group d-flex flex-column">
         <label for="image">Image</label>
        <input type="file" value="{{$annonce->image}}"class="form-control" name="images[]" multiple >
    </div>


    <div class="form-group">
        <button type="submit" class="btn btn-outline-primary">Modifier</button>
        <a href="{{route('annonces.list')}}" class="btn btn-outline-secondary">Retour</a>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</form>




@endsection

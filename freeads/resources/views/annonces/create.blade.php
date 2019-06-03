@extends('layouts.app')

@section('content')

    <form action="{{route('annonces.store')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" name="title" class="form-control" value="{{old('title')}}">
    </div>

    <div class="form-group">
        <label for="price">Prix</label>
        <input type="number" name="price" class="form-control" value="{{old('price')}}">
    </div>

    <select id="pet-select" name="categorie">
        <option value="" name="categorie">Catégorie</option>
        <option value="Vêtement" name="categorie">Vêtement</option>
        <option value="Véhicule" name="categorie">Véhicule</option>
        <option value="Maison" name="categorie">Maison</option>
        <option value="Jardin" name="categorie">Jardin</option>
        <option value="Fleurs" name="categorie">Fleurs</option>
    </select><br><br><br>

    <div class="form-group">
        <label for="title">Contenu</label>
        <textarea name="content" row="10" class="form-control" value="{{old('content')}}"></textarea>
    </div>

  
    <div class="form-group d-flex flex-column">
         <label for="image">Image</label>
        <input required type="file" class="form-control" name="images[]" multiple>
    </div>
    

    <div class="form-group">
        <button type="submit" class="btn btn-outline-primary">Ajouter une annonce</button>
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

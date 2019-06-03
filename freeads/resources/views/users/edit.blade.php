@extends('layouts.app')

@section('title','Edit Profile')

@section('content')


<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Edit Profile</h2>

        </div>


    </div>

</div>


    <form action="{{route('user.update',['id'=> $user->id])}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Nom:</label>
            <input type="text" name="name" value="{{$user->name}}" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{$user->email}}" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Nouveau mot de passe:</label>
            <input type="password" name="new_password"  class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Confirmer mot de passe:</label>
            <input type="password" name="conf_password"  class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary">Modifier</button>
        </div>
        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
        </div>
    </form>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            

    





@endsection
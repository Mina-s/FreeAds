@extends('layouts.app')



@section('content')


<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

    @if (isset($message))

        <div class="alert alert-info">

            {{ $message }} <br><br>

        </div>

    @endif

        <div class="form-group">

            <strong>Name:</strong>

            {{ $user->name }}

        </div>

        <div class="form-group">

            <strong>Email:</strong>

            {{ $user->email }}

        </div>

        <div class="form-group">

            <strong>Inscrit depuis le:</strong>

            {{ $user->created_at }}

        </div>

            <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
            <a href="{{ route('user.edit', ['id' => Auth::user()->id]) }}" class="btn btn-success Add-friend"><i class="fa fa-rocket" aria-hidden="true"></i> Edit profile</a>
             <form action="{{route('user.destroy', ['id' => Auth::user()->id])}}" method="POST">
                    @csrf
                        <button type="submit" class="btn btn-outline-danger" >Supprimer mon compte</button>
            </form>

     </div>

                          


</div>



@endsection
@extends('template')

@section('contenu')
	<form method="POST" action="{!! url('users') !!}" accept-charset="UTF-8">
		{!! csrf_field() !!}   
		<label for="nom">Nom : </label>    
		<input name="nom" type="text" id="nom">   
        <label for="password"> Mot de passe : </label>    
		<input name="password" type="password" id="password">  
		<input type="submit" value="Envoyer !">	
	</form>
@endsection
@extends('layouts.layout')

@section('contenu')
<h1>Welcom to FreeAds<h1>
{!! Form::open(['method'=>'GET','url'=>'result','class'=>'navbar-form navbar-left','role'=>'search']) !!}


        <div class="input-group custom-search-form">

            <input type="text" class="form-control" name="search" placeholder="Search...">
            
              <span class="input-group-btn">
             
              <button class="btn btn-default-sm"
              type="submit">
valider
              <i class="fa fa-search">

              </button>

              </span>

        </div><br>
        <select id="pet-select" name="pricemin">
    <option value="0" name="product">price min</option>
    <option value="18" name="product">18</option>
    <option value="28" name="product">28</option>
    <option value="58" name="product">58</option>
    <option value="68" name="product">68</option>
    <option value="118" name="product">118</option>
    <option value="1018" name="product">1018</option>
</select><br>

<select id="pet-select" name="pricemax">
    <option value="1089898736453" name="product">price max</option>
    <option value="1018" name="product">1018</option>
    <option value="1818" name="product">1818</option>
    <option value="2000" name="product">2000</option>
    <option value="18000000" name="product">18000000</option>
    <option value="99999999" name="product">99999999</option>
    <option value="1089898736453" name="product">1089898736453</option>
</select><br><br>

    {!! Form::close() !!} 
  <table class="table table-striped">
    <thead>
<tr>
<td>AD</td>
<td>image</td>
</tr>
    </thead>
    <tbody>

        @foreach($ads as $ad)
        <tr>
            <td> ID {{$ad->id}} ||| Title of the ad: {{$ad->title}}</td>
           <td>@foreach(json_decode($ad->filename) as $image)
           <img src="{{asset('images/'.$image)}}" width=100 height=100>
           @endforeach
           </td>
           <td><a href="{{ route('ads.show',$ad->id)}}" class="btn">See more</a></td>
        </tr>
        @endforeach
    </tbody>
  </table>
 
<div>
@endsection


@endsection
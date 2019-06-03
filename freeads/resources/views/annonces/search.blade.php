@extends('layouts.app')



@section('content')


<table class="table table-bordered table-hover" >

    <thead>
        <th>result</th>
        <th>Catégorie</th>
        <th>Price</th>
        

            <tr>


            </tr>
     </thead>

<tbody>
            
            @if((count($annonce)>0))
            @foreach($annonce as $annonce)
                <tr>
                    <td> <a href="{{route('annonces.show',['id'=> $annonce->id])}}">{{$annonce->title}}</a> </td>
                    <td>{{ $annonce->categorie }} </td>
                    <td>{{ $annonce->price}}</td>


                </tr>
               
               
          
            @endforeach

            @else
            {{'pas de resultats'}}
            @endif
            </tbody>

            </table>

            </div>




@endsection


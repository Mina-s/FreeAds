@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     You are logged in! 
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <h1> Salut {{ Auth::user()->name }}</h1>

                            <a href="{{ route('user.show', ['id' => Auth::user()->id]) }}" class="btn btn-primary Add-friend">
                                <i class="fa fa-rocket" aria-hidden="true"></i> Voir profile
                            </a>

                          
                            <br>
                            <br>
                            <br>

                            <h1>Recherche<h1>

                            

                             <form action="{{route('annonces.search')}}" method="post" role="search"> 
                        
                                {{ csrf_field() }}

                                <div class="input-group custom-search-form">
                                        <input type="text" class="form-control" name="search" placeholder="Search...">
                                </div><br>

                                <div class="input-group custom-search-form">

                                    <select id="perice-select" name="pricemin">
                                        <option value="0" name="product">price min</option>
                                        <option value="20" name="product">20</option>
                                        <option value="30" name="product">30</option>
                                        <option value="50" name="product">50</option>
                                        <option value="70" name="product">70</option>
                                        <option value="90" name="product">90</option>
                                        <option value="100" name="product">100</option>
                                    </select><br>

                                    <select id="price-select" name="pricemax">
                                        <option value="123456789" name="product">price max</option>
                                        <option value="200" name="product">200</option>
                                        <option value="300" name="product">300</option>
                                        <option value="500" name="product">500</option>
                                        <option value="10000" name="product">10000</option>
                                        <option value="99999999" name="product">99999999</option>
                                        <option value="123456789" name="product">123456789</option>
                                    </select>
                                    <br>
                                    <br>

                                    </div>
                                    <div class="input-group">
                                        <p>Trier par:</p>

                                        <select name="order" >
                                            <option value="title">Nom
                                            <option value="price">Prix
                                        </select>
                        
                                            <button class="btn btn-default-md"type="submit">valider<i class="fa fa-search"></button>
                                    </div>
                                        
                                
                                </div>

                            </form>

                        </div>

                    </div>
                </div>
                
            </div>
        </div>
    </div>

    
</div>
@endsection




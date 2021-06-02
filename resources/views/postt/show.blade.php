@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class=" offset-2 col-md-9 text-center fs-5 mt-5"> 
            <div class="card border border-4 shadow">
                <div class="card-profile text-light py-2"><cite title="Source Title text-left">{{ $showpost->user->name}} </cite></div>
                <h5 class="card-header">{{$showpost->titulo}}</h5>
                <p class="card-body">{{$showpost->contents}}</p>
                <div class="card-footer text-decoration-underline"><cite title="Source Title">{{$showpost->fecha}} </cite></div>
            </div>
        </div>   
    </div>    
</div> 
@endsection
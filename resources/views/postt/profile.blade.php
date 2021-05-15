@extends('layouts.app')
@section('content')

<div class="container">
   <div class="row">
    @foreach ($userpost->posts as $post)
      <div class="col-md-3 mt-2 text-center">
        <div class="card">
            <div class="card-body">
                <div class="">{{ $post->user->name}}</div>
                <h5 class="card-header"> {{$post->Titulo}}</h5>
                <p class="card-text"> {{$post->Contents}}</p>
                <div class="card-footer">{{$post->Fecha}} <cite title="Source Title"> </cite> </div>
            </div>
        </div> 
      </div>
    @endforeach
   </div>
   
        
    
    
</div>

@endsection
@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        @foreach ($userpost->posts as $post)  
        <div class="col-md-3 mt-2 text-center"> 
            <div class="card border border-4 shadow">
                <div class="card-title py-2"><cite title="Source Title">{{ $post->user->name}} </cite></div>
                <h5 class="card-header">{{$post->titulo}}</h5>
                <p class="card-body">{{$post->contents}}</p>
                <div class="card-footer text-decoration-underline"><cite title="Source Title">{{$post->fecha}} </cite></div>
            </div>
        </div>    
         
        
        @endforeach
    </div> 

</div>

    <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" style="width: 380px;" >
        <!-- titulo siderbar-->
        <a href="#" class="d-flex bg-primary align-items-center flex-shrink-0 p-3 link-dark text-decoration-none rounded-top border-bottom text-light">
            <svg class="me-2" width="30" height="24"></svg>
            <span class="fs-5 pl-4 fw-semibold">tweets</span>
        </a>
         <!-- cuerpo del siderbar-->
        @foreach ($twitterapi as $tweet) 

        <a href="#" class="list-group-item list-group-item-action py-3 lh-tight" >
            <div class="d-flex w-100 align-items-center justify-content-around">
                <div class="col-10 mb-1 small"><img class="rounded-circle" src={{$tweet->user->profile_image_url}}></div>
                <strong class="mb-1">{{$tweet->user->location}}</strong>
            </div>
            <strong class="mb-1">{{$tweet->user->name}}</strong><br>
            <small>{{$tweet->text}} </small>
        </a>
        @endforeach
    </div>


 

@endsection
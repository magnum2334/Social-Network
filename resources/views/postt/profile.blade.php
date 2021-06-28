@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row offset-1">
      
        @foreach ($userpost->posts as $post)  
        <div class=" col-md-4 mt-2 text-center fs-5"> 
            <div class="card border border-4 shadow">
                <div class="card-profile text-light py-2"><cite title="Source Title text-left">{{ $post->user->name}} </cite></div>
                <h5 class="card-header">{{$post->titulo}}</h5>
                <p class="card-body">{{$post->contents}}</p>
                <div class="card-footer text-decoration-underline"><cite title="Source Title">{{$post->fecha}} </cite></div>
            </div>
        </div>    
        @endforeach
    </div> 
</div>
<div id="sidebar">
    <div class="toggle-btn">
        <div class="s">
        <a href="#"><i class="fab fa-twitter text-info "></i></a>
        </div>
    </div>  
    <!-- cuerpo del siderbar-->
    <div class="list" >
        <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" id="scroll-siderbar" >               
             <!-- tweets-->
            @foreach ($twitterapi as $tweet) 
             <!-- variable para ocultar el tweet-->
             @php $hide_this_tweet=false; @endphp
                @foreach($userpost->hidetweets as $hidetweet)
                <!-- preguntamos si el tweet ya se encuentra en la coleccion tweethide-->
                @if($tweet->id==$hidetweet['tweet_id'])
               
                <div class="d-flex w-100 align-items-center justify-content-around">
                    <strong class="mb-1">{{$hidetweet->tweet_id}}</strong>

                    <form method="post" action="{{url('/postt/profile/'. $hidetweet->tweet_id)}}">
                       {{@csrf_field()}}
                       {{method_field('DELETE')}}
                        <button type="submit" onclick="return confirm('aa')"> 
                            desocultar
                        </button>
                    </form>

                </div> 
                 @php $hide_this_tweet=true; @endphp
                @endif
                @endforeach 
             
            <div @if($hide_this_tweet) style="display:none;" @endif id="tweethide"  class="list-group-item list-group-item-action py-3">
                <div class="d-flex w-100 align-items-center justify-content-around">
                    <div class="col-10 mb-1 small"><img class="rounded-circle" src={{$tweet->user->profile_image_url}}></div>
                    @if(Auth::user()->id==$user_id)
                        <div>  
                            <a class="hidetweet" data-href="{{url('/postt/profile/' .$tweet->id )}}">ocultar</a>
                        </div>
                    @endif
                </div>
                <strong class="mb-1">{{$tweet->user->name}}</strong><br>
                <small>{{$tweet->text}}</small> <br>
                <strong class="mb-1">{{$tweet->user->location}}</strong>
            </div>
            @endforeach 
        </div> 
    </div>
</div>

<div class="d-flex flex-row-reverse my-3 mr-5">            
    <a href="{{url('/postt')}}" >   
        <div class="btn btn-primary rounded-circle fs-2">
            <i class="fas fa-undo"></i>
        </div>
    </a>
</div>
  
@endsection
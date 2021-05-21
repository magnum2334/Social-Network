@extends('layouts.app')
@section('content')

<div class="container">

    <table class="table table-striped table-white table-hover my-5">
        <thead class="table-dark ">
            
            <tr>
                <th>Name user</th>
                <th>Titulo</th>
                <th>Contenido</th>
                <th>Fecha</th>
                <th>Acciones<th>
            </tr>
        
        </thead>

        <tbody class="my-5 ">
            @foreach($posts as $post)
            <tr>
                <td><a style="text-decoration: underline;" href="{{url('/postt/profile/'. $post->user_id)}}">{{$post->user->name}}</a></td>
                <td>{{$post->titulo}}</td>
                <td>{{$post->contents}}</td>
                <td>{{$post->fecha}}</td>
                <td> <a href="{{url('/postt/edit/'. $post->id)}}" class="btn btn-warning">{{__('Edit')}}</a></td>
                <td></td>
            </tr>
            @endforeach
        </tbody>  
    </table>
    {{ $posts->links() }}  
</div>
    
    <div class="floating">
        <a href="{{url('/postt/create')}}" class="btn btn-outline-dark btn-fab btn-lg" id ="btn-post" title="Agregar nuevo post">
             <i class="material-icons" >Publicar </i>
        </a>
    </div>

@endsection
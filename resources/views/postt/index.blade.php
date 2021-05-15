@extends('layouts.app')
@section('content')
<div class="container">

    <table class="table table-striped table-white table-hover">
        <thead>
            
             <tr>
             <th>Name user</th>
             <th>Titulo</th>
             <th>Contenido</th>
             <th>Fecha</th>
             <th>Acciones <th>
             </tr>
        
        </thead>
        <tbody>
            @foreach($posts as $post)
            
            <tr>
            <td><a href="{{url('/postt/profile/'. $post->user_id)}}">{{$post->user->name}}</a> </td>
            <td>{{$post->Titulo}}</td>
            <td>{{$post->Contents}}</td>
            <td>{{$post->Fecha}}</td>
            <td>  <a href="{{url('/postt/edit/'. $post->id)}}" class="btn btn-warning">edit </a>  </td>
            </tr>
            @endforeach
        </tbody>
    
    </table>
    </div>
    
    <div class="floating">
    <a href="{{url('/postt/create')}}" class="btn btn-outline-dark btn-fab btn-lg " title="Agregar nuevo post">
          <i class="material-icons">Publicar </i>
    </a>
    </div>
@endsection
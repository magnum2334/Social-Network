@extends('layouts.app')
@section('contect')
<div class="container">
    <table class="table table-striped table-white table-hover">
        <thead>
             <tr>
             <th>Contenido</th>
             <th>Fecha</th>
             </tr>
        
        </thead>
        <tbody>
            @foreach($posts as $post)
            
            <tr>
            <td>post->contenido</td>
            <td>post->date</td>
            </tr>
            @endforeach
        </tbody>
    
    </table>
    </div>
    
    <div class="floating">
    <a href="{{url('/postt/create')}}" class="btn btn-outline-dark btn-fab btn-lg " title="Agregar nuevo post">
          <i class="material-icons">Publicar</i>
    </a>
    </div>
@endsection
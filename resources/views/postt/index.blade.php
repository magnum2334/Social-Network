@extends('layouts.app')
@section('content')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                <td><a style="text-decoration: underline;" href="{{url('/postt/profile/'. $post->user_id)}}">{{$post->user->name}}</a> </td>
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
        <a href="{{url('/postt/create')}}" class="btn btn-outline-dark btn-fab btn-lg" title="Agregar nuevo post">
             <i class="material-icons">Publicar </i>
        </a>
    </div>
    @if (Session::get('error'))
        <script type="text/javascript" class="text-center">
            
            swal({
                icon: 'warning',
                title:'Error paso algo',
                text:"{{Session::get('error')}}",
                type:'error',
                timer:4000
            }).then((value) => {
             }).catch(swal.noop);
    
    </script>
    <?php Session::forget('error');?>
    @endif
    
@endsection
@extends('layouts.app')
@section('contect')
     @include('postt.form', ['method'=> 'PUT', 'url' => url('/postt/edit/' . $post->id),['Modo'=>'editar']])
@endsection
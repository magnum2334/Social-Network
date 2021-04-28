@extends('layouts.app')
@section('contect')
    @include('postt.form', ['method' => 'POST', 'url' => url('/postt/create'),['Modo'=>'agregar']])
    
@endsection
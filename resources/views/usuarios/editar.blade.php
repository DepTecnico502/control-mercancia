@extends('layouts.app')

@section('titulo', 'Editar Usuario')

@section('contenido')
    <livewire:editar-usuario
        :user="$user"
    >
@endsection
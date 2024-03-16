@extends('layouts.app')

@section('titulo', 'Editar recepción')

@section('contenido')
    <livewire:editar-recepcion 
        :mercancia="$mercancia"
    />
@endsection
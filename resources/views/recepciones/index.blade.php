@extends('layouts.app')

@section('titulo', 'Recepción')

@section('contenido')
    <div class="py-10">
        <h2 class="text-2xl md:text-4xl text-gray-600 text-center font-extrabold my-5">Buscar y Filtrar Recepciones</h2>
        <livewire:filtrar-recepciones />
    </div>

    <livewire:ver-recepcion>
@endsection
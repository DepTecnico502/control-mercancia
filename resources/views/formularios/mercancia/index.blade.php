@extends('layouts.formulario')

@section('titulo', 'Formulario')

@section('titulo-formulario', 'Control Entrada De Mercancia')

@section('contenido')
    <div class="shadow-xl p-10 rounded-xl">
        @if (session()->has('mensaje'))
            <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-sm">
                {{ session('mensaje') }}
            </div>
        @endif
        
        {{-- Formulario para crear entrada de mercancia --}}
        <livewire:crear-mercancia>
    </div>
@endsection


@extends('layouts.app')

@section('titulo', 'Crear Usuario')

@section('contenido')
    {{-- Mensaje --}}
    <div class="py-5">
        @if (session()->has('mensaje'))
            <div role="alert" class="alert alert-success text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{ session('mensaje') }}</span>
            </div>
        @endif
    </div>

    {{-- Componente --}}
    <livewire:crear-usuario> 
@endsection
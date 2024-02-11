@extends('layouts.app')

@section('titulo', 'Partida')
    
@section('contenido')
    <div class="shadow-xl p-10 rounded-xl">
        @if (session()->has('mensaje'))
            <div role="alert" class="alert alert-success text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{ session('mensaje') }}</span>
            </div>
        @endif
        <div class="pb-3">
            <strong>No Pedido:</strong>
            <span>{{ $mercancia->no_pedido }}</span>
        </div>
        <div class="pb-3">
            <strong>No Guía:</strong>
            <span>{{ $mercancia->no_guia }}</span>
        </div>
        <div class="pb-3">
            <strong>Proveedor:</strong>
            <span>{{ $mercancia->proveedor->proveedor }}</span>
        </div>
        <div class="pb-3">
            <strong>Monto:</strong>
            <span>{{ $mercancia->monto ? 'Q. ' . $mercancia->monto : 'Ninguno' }}</span>
        </div>
        <div class="pb-3">
            <strong>Recibido por:</strong>
            <span>{{ $mercancia->recibido->recibido }}</span>
        </div>

        {{-- Formulario --}}
        <livewire:crear-partida>
    </div>
@endsection
@extends('layouts.app')

@section('titulo', 'Usuarios')
    
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

<div class="overflow-x-auto">
    <table class="table table-zebra">
        <!-- head -->
        <thead>
            <tr>
                <th>Username</th>
                <th>Correo</th>
                <th>Rol</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <!-- row -->
            @forelse ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->name}}</td>
                    <td>{{ $usuario->email}}</td>
                    <td>{{ $usuario->rol->rol}}</td>
                    <td>
                        <a href="{{ route('usuario.edit', $usuario->id) }}" class="btn btn-sm btn-primary text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                              </svg>                              
                        </a>
                    </td>
                </tr>
            @empty
            <tr>
                <td>
                    <p>No se encontro ningun registro</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="my-10">
        {{ $usuarios->links() }}
    </div>
</div>
@endsection
@extends('layouts.app')

@section('titulo', 'Artículos en bodega')
    
@section('contenido')
<form action="{{ route('articulos.bodega.index') }}" method="GET">
    <div class="md:grid md:grid-cols-3 gap-5">
        <div class="mb-5">
            <label 
                class="block mb-1 text-sm text-gray-500 uppercase font-bold "
                for="termino">Término de Búsqueda
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input 
                    type="text" 
                    name="buscar"
                    id="buscar" 
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" 
                    placeholder="Buscar Transporte, No Guía, Proveedor, Recibido, No Pedido."
                    value="{{ request('buscar') }}"
                />
                <input 
                    type="submit" 
                    class="text-white absolute end-2.5 bottom-2.5 bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-4 py-2" 
                    value="Buscar"
                />
            </div>
        </div>
    </div>
</form>
{{-- <form action="{{ route('articulos.bodega.index') }}" method="get">
    <input type="text" name="buscar" placeholder="Buscar por proveedor, código, etc." value="{{ request('buscar') }}">
    <button type="submit">Buscar</button>
</form> --}}
<div class="overflow-x-auto">
    <table class="table table-xs">
        <thead>
            <tr>
                <th>No. partida</th> 
                <th>proveedor</th> 
                <th>codigo</th> 
                <th>Descripcion</th> 
                <th>cantidad</th>
                <th>Estado</th>
            </tr>
        </thead> 
        <tbody>
            @foreach ($articulosTransito as $transito)
                <tr>
                    <td>{{ $transito['numero_documento'] }}</td> 
                    <td>{{ $transito['nombre_proveedor'] }}</td> 
                    <td>{{ $transito['numero_articulo'] }}</td> 
                    <td>{{ $transito['descripcion_articulo'] }}</td> 
                    <td>{{ $transito['cantidad'] }}</td>
                    <td>
                        @if($transito['estado'] === 'Recibido')
                            <div class="badge badge-info text-white">Recibido</div>
                        @elseif($transito['estado'] === 'Valorizado')
                            <div class="badge badge-warning text-white">Valorizado</div>
                        @elseif($transito['estado'] === 'Colocado')
                            <div class="badge badge-primary text-white">Colocado</div>
                        @elseif($transito['estado'] === 'Liberado')
                            <div class="badge badge-success text-white">Liberado</div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
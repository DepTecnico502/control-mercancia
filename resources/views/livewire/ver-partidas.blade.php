<div>
    <div class="overflow-x-auto">
        <table class="table table-zebra">
            <!-- head -->
            <thead>
                <tr>
                    {{-- Mercancia --}}
                    <th>Fecha recepción</th>
                    <th>No Pedido</th>
                    <th>No Guía</th>
                    <th>Bultos</th>
                    <th>Monto</th>
                    <th>Proveedor</th>
                    {{-- Partida --}}
                    <th>No. Partida</th>
                    <th>Documento</th>
                    <th>Comentario</th>
                    {{-- Checks --}}
                    <th>Prd. nuevo</th>
                    <th>Valorizado</th>
                    <th>Liberado</th>
                    <th>Colocado</th>
                </tr>
            </thead>
            <tbody>
            <!-- row -->
                @forelse ($partidas as $partida)
                    <tr>
                        {{-- Mercancia --}}
                        <td>{{ date('d-m-y H:i', strtotime($partida->mercancia->created_at)) }}</td>
                        <td>{{ $partida->mercancia->no_pedido }}</td>
                        <td>{{ $partida->mercancia->no_guia }}</td>
                        <td>{{ $partida->mercancia->bultos }}</td>
                        <td><span>{{ $partida->mercancia->monto ? 'Q. ' . $partida->mercancia->monto : 'Ninguno' }}</span></td>
                        <td>{{ $partida->mercancia->proveedor->proveedor }}</td>
                        {{-- Partida --}}
                        <td>{{ $partida->no_partida }}</td>
                        <td>
                            <img 
                            src="{{ $partida->mercancia->imagen_doc ? asset('storage/fotos/mercancia/'.$partida->mercancia->imagen_doc) : asset('assets/img/sin_imagen.png') }}"
                                alt="partida No. {{ $partida->id }}"
                                width="50px"
                                class="imagen-modal"
                            >
                        </td>
                        <td>{{ $partida->comentario }}</td>
                        <td>
                            @if ($partida->fecha_producto_nuevo === null)
                                <a href="{{ route('check.producto.nuevo', $partida->id) }}" class="btn btn-sm btn-circle text-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>                                                              
                                </a>
                            @else
                                {{ $partida->fecha_producto_nuevo }}
                            @endif
                        </td>
                        <td>
                            @if ($partida->fecha_valorizado === null)
                                <a href="{{ route('check.valorizado', $partida->id) }}" class="btn btn-sm btn-circle text-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>                                                              
                                </a>
                            @else
                                {{ $partida->fecha_valorizado }}
                            @endif
                        </td>
                        <td>
                            @if ($partida->fecha_liberado === null)
                                <a href="{{ route('check.liberado', $partida->id) }}" class="btn btn-sm btn-circle text-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>                                                              
                                </a>
                            @else
                                {{ $partida->fecha_liberado }}
                            @endif
                        </td>
                        <td>
                            @if ($partida->fecha_colocado === null)
                                <a href="{{ route('check.colocado', $partida->id) }}" class="btn btn-sm btn-circle text-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>                                                              
                                </a>
                            @else
                                {{ $partida->fecha_colocado }}
                            @endif
                        </td>
                    </tr>
                @empty
                    <p>No se encontro ningun registro</p>
                @endforelse
            </tbody>
        </table>
        <div class="my-10">
            {{ $partidas->links() }}
        </div>
        <dialog id="my_modal_2" class="modal">
            <div class="modal-box w-11/12 max-w-5xl">
                <img src="" alt="Imagen ampliada" id="imagenModalSrc" class="mx-auto">
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>
    </div>
</div>
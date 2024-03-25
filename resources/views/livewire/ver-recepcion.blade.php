<div>
    <div class="overflow-x-auto">
        <table class="table table-zebra">
            <!-- head -->
            <thead>
                <tr>
                    <th>Fecha recepción</th>
                    <th>Transporte</th>
                    <th>No Guía</th>
                    <th>Bultos</th>
                    <th>Monto</th>
                    <th>Proveedor</th>
                    <th>Recibido</th>
                    <th>No Pedido</th>
                    <th>Documento</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <!-- row -->
                @forelse ($mercancias as $mercancia)
                    <tr>
                        <td>{{ date('d-m-y H:i', strtotime($mercancia->created_at)) }}</td>
                        <td>{{ $mercancia->transporte->transporte }}</td>
                        <td>{{ $mercancia->no_guia }}</td>
                        <td>{{ $mercancia->bultos }}</td>
                        <td>{{ $mercancia->monto ? 'Q. ' . $mercancia->monto : 'Ninguno' }}</td>
                        <td>{{ $mercancia->proveedor->proveedor }}</td>
                        <td>{{ $mercancia->recibido->recibido }}</td>
                        <td>{{ $mercancia->no_pedido }}</td>
                        <td class="flex items-center">
                            <img 
                                src="{{ $mercancia->imagen_doc ? asset('storage/fotos/mercancia/'.$mercancia->imagen_doc) : asset('assets/img/sin_imagen.png') }}"
                                alt="Mercancia No. {{ $mercancia->id }}"
                                width="50px"
                                class="imagen-modal"
                            >
                            <a 
                                href="{{ route('recepcion.edit', $mercancia->id) }}"
                                class="btn btn-sm btn-primary ml-2 inline-flex items-center"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99">
                                </svg>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('partida.create', $mercancia->id) }}" class="btn btn-sm btn-success text-white">Agregar partida</a>
                        </td>
                    </tr>
                @empty
                    <p>No se encontro ningun registro</p>
                @endforelse
            </tbody>
        </table>
        <div class="my-10">
            {{ $mercancias->links() }}
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

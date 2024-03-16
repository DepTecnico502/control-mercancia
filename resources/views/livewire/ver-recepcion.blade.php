<div>
    <div class="overflow-x-auto">
        <table class="table table-zebra">
            <!-- head -->
            <thead>
                <tr>
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
                        <td>{{ $mercancia->transporte->transporte }}</td>
                        <td>{{ $mercancia->no_guia }}</td>
                        <td>{{ $mercancia->bultos }}</td>
                        <td>{{ $mercancia->monto ? 'Q. ' . $mercancia->monto : 'Ninguno' }}</td>
                        <td>{{ $mercancia->proveedor->proveedor }}</td>
                        <td>{{ $mercancia->recibido->recibido }}</td>
                        <td>{{ $mercancia->no_pedido }}</td>
                        <td>
                            <img 
                            src="{{ $mercancia->imagen_doc ? asset('storage/fotos/mercancia/'.$mercancia->imagen_doc) : asset('assets/img/sin_imagen.png') }}"
                                alt="Mercancia No. {{ $mercancia->id }}"
                                width="50px"
                                class="imagen-modal"
                                {{-- onclick="my_modal_2.showModal()" --}}
                            >
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
                <img src="" alt="Imagen ampliada" id="imagenModalSrc">
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>
    </div>
</div>

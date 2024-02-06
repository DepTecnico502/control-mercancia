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
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
            <!-- row -->
                @forelse ($mercancias as $mercancia)
                    <tr>
                        <td>{{ $mercancia->transporte->transporte }}</td>
                        <td>{{ $mercancia->no_guia }}</td>
                        <td>{{ $mercancia->bultos }}</td>
                        <td>{{ $mercancia->monto }}</td>
                        <td>{{ $mercancia->proveedor->proveedor }}</td>
                        <td>{{ $mercancia->recibido->recibido }}</td>
                        <td>{{ $mercancia->no_pedido }}</td>
                        <td>{{ $mercancia->imagen_doc }}</td>
                        <td>ACCION</td>
                    </tr>
                @empty
                    <p>No se encontro ningun registro</p>
                @endforelse
            </tbody>
        </table>
        <div class="my-10">
            {{ $mercancias->links() }}
        </div>
    </div>
</div>

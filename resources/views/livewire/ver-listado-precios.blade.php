<div>
    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                <th>Códgio</th>
                <th>Descripción</th>
                <th>Existencias</th>
                <th>Codigo de Barras</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($listadoPrecios as $listadoPrecio)
                    <tr>
                        <td>{{ $listadoPrecio->codigo }}</td>
                        <td>{{ $listadoPrecio->descripcion }}</td>
                        <td>{{ $listadoPrecio->existencias }}</td>
                        <td>{{ $listadoPrecio->codigo_barras }}</td>
                    </tr>
                @empty
                    <span>No se encontraron resultado</span>
                @endforelse
            </tbody>
        </table>
        {{ $listadoPrecios->links() }}
    </div>
</div>

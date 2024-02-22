<div>
    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
            <tr>
                <th>Código</th>
                <th>Transporte</th>
                <th>Estado</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($transportes as $transporte) 
                    <tr>
                        <td>{{ $transporte->codigo }}</td>
                        <td>{{ $transporte->transporte }}</td>
                        <td>
                            {!! $transporte->estado === 1 ? 
                                '<span class="badge badge-success text-white">Activo</span>' 
                                : 
                                '<span class="badge badge-error text-white">Inactivo</span>' 
                            !!}
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                  </svg>                                  
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $transportes->links() }}
    </div>
</div>
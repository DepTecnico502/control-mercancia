<?php

namespace App\Http\Controllers;

use App\Models\Partida;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticuloBodegaController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::get('https://script.google.com/macros/s/AKfycbxLBXyoD05aRtMHCX9mQEQvGsV41E17Ej0qcEiDnLod5nAwPRmk9-D9eqjttNf1_se8MQ/exec', [
            'sheet' => 'articulos-transito',
        ]);
    
        $articulosTransito = $response->json();
    
        // Filtrar los resultados si hay un valor en el campo de búsqueda
        if ($request->has('buscar')) {
            $filtro = $request->input('buscar');
            $articulosTransito = array_filter($articulosTransito, function ($articulo) use ($filtro) {
                return 
                    stripos($articulo['nombre_proveedor'], $filtro) !== false
                    || stripos($articulo['numero_documento'], $filtro) !== false
                    || stripos($articulo['numero_articulo'], $filtro) !== false
                    || stripos($articulo['descripcion_articulo'], $filtro) !== false;
            });
        }

        $noPartidas = Partida::pluck('no_partida')->toArray();
        $numerosPartidaDeseados = $noPartidas;
        $articulosTransito = array_filter($articulosTransito, function ($articulo) use ($numerosPartidaDeseados) {
            return in_array($articulo['numero_documento'], $numerosPartidaDeseados);
        });

        // Asociar el estado a cada artículo
        foreach ($articulosTransito as &$articulo) {
            $articulo['estado'] = $this->determinarEstado($articulo);
        }

        return view('articulosBodega.index', [
            'articulosTransito' => $articulosTransito,
        ]);
    }

    private function determinarEstado($articulo)
    {
        // Buscar la partida correspondiente al número de documento
        $partida = Partida::where('no_partida', $articulo['numero_documento'])->first();
        
        // dd($articulo['numero_documento']);
        // Verificar el estado basado en las fechas en la partida
        if (!is_null($partida->fecha_valorizado) && is_null($partida->fecha_liberado) && is_null($partida->fecha_colocado)) {
            return 'Valorizado';
        } elseif (!is_null($partida->fecha_valorizado) && !is_null($partida->fecha_liberado) && is_null($partida->fecha_colocado)) {
            return 'Liberado';
        } elseif (!is_null($partida->fecha_valorizado) && !is_null($partida->fecha_liberado) && !is_null($partida->fecha_colocado)) {
            return 'Colocado';
        } else {
            return 'Recibido';
        }
    }

    // public function index()
    // {
    //     $response = Http::get('https://script.google.com/macros/s/AKfycbxLBXyoD05aRtMHCX9mQEQvGsV41E17Ej0qcEiDnLod5nAwPRmk9-D9eqjttNf1_se8MQ/exec', [
    //         'sheet' => 'articulos-transito',
    //     ]);

    //     $articulosTransito = $response->json();

    //     return view('articulosBodega.index', [
    //         'articulosTransito' => $articulosTransito
    //     ]);
    // }
}

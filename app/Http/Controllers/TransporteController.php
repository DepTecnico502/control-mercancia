<?php

namespace App\Http\Controllers;

use App\Imports\TransportesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TransporteController extends Controller
{
    public function index()
    {
        return view('transportes.index');
    }

    public function crear()
    {
        return view('transportes.importar');
    }

    public function import(Request $request)
    {
        try {
            $archivo_excel = $request->file('archivo_excel');
            
            Excel::import(new TransportesImport, $archivo_excel);
    
            return redirect()->back()->with('mensaje', 'Archivo Excel importado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Hubo un problema durante la importación del archivo. Detalles: ' . $e->getMessage());
        } 
    }
}

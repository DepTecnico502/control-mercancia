<?php

namespace App\Http\Controllers;

use App\Imports\ListadoPreciosImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ListadoPrecioController extends Controller
{
    public function index()
    {
        return view('listadoPrecios.index');
    }

    public function crear()
    {
        return view('listadoPrecios.importar');
    }

    public function import(Request $request)
    {
        try {
            $archivo_excel = $request->file('archivo_excel');
            
            Excel::import(new ListadoPreciosImport, $archivo_excel);
    
            return redirect()->back()->with('mensaje', 'Archivo Excel importado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Hubo un problema durante la importación del archivo. Detalles: ' . $e->getMessage());
        } 
    }
}

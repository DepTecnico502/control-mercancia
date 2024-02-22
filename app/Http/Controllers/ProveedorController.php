<?php

namespace App\Http\Controllers;

use App\Imports\ProveedoresImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProveedorController extends Controller
{
    public function index()
    {
        return view('proveedores.index');
    }

    public function crear()
    {
        return view('proveedores.importar');
    }

    public function import(Request $request)
    {
        try {
            $archivo_excel = $request->file('archivo_excel');
            
            Excel::import(new ProveedoresImport, $archivo_excel);
    
            return redirect()->back()->with('mensaje', 'Archivo Excel importado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Hubo un problema durante la importación del archivo. Detalles: ' . $e->getMessage());
        }
    }      
}

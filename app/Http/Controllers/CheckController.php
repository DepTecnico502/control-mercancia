<?php

namespace App\Http\Controllers;

use App\Models\Partida;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function checkProductoNuevo(Partida $partida)
    {
        // Verificar si la fecha_producto_nuevo es null
        if ($partida->fecha_producto_nuevo === null) {
            // Actualizar la fecha_producto_nuevo con la fecha actual
            $partida->update(['fecha_producto_nuevo' => now()]);

            // Redireccionar o devolver una respuesta
            return redirect()->back()->with('mensaje', 'Registro actualizado correctamente.');
        } else {
            // La fecha ya está establecida, puedes manejar esto de acuerdo a tus necesidades
            return redirect()->back()->with('error', 'La fecha ya ha sido establecida previamente.');
        }
    }

    public function checkValorizado(Partida $partida)
    {
        if ($partida->fecha_valorizado === null) {
            $partida->update(['fecha_valorizado' => now()]);

            return redirect()->back()->with('mensaje', 'Registro actualizado correctamente.');
        } else {
            return redirect()->back()->with('error', 'La fecha ya ha sido establecida previamente.');
        }
    }

    public function checkLiberado(Partida $partida)
    {
        if ($partida->fecha_liberado === null) {
            $partida->update(['fecha_liberado' => now()]);

            return redirect()->back()->with('mensaje', 'Registro actualizado correctamente.');
        } else {
            return redirect()->back()->with('error', 'La fecha ya ha sido establecida previamente.');
        }
    }

    public function checkColocado(Partida $partida)
    {
        if ($partida->fecha_colocado === null) {
            $partida->update(['fecha_colocado' => now()]);

            return redirect()->back()->with('mensaje', 'Registro actualizado correctamente.');
        } else {
            return redirect()->back()->with('error', 'La fecha ya ha sido establecida previamente.');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Partida;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function checkProductoNuevo(Partida $partida)
    {
        // Obtiene la fecha y hora actual
        $currentDateTime = Carbon::now();

        // Formatea la fecha y hora como YYYY-MM-DD HH:mm:ss
        $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');
        
        // Verificar si la fecha_producto_nuevo es null
        if ($partida->fecha_producto_nuevo === null) {
            // Actualizar la fecha_producto_nuevo con la fecha actual
            $partida->update(['fecha_producto_nuevo' => $formattedDateTime]);

            // Redireccionar o devolver una respuesta
            return redirect()->back()->with('mensaje', 'Registro actualizado correctamente.');
        } else {
            // La fecha ya está establecida, puedes manejar esto de acuerdo a tus necesidades
            return redirect()->back()->with('error', 'La fecha ya ha sido establecida previamente.');
        }
    }

    public function checkValorizado(Partida $partida)
    {
        // Obtiene la fecha y hora actual
        $currentDateTime = Carbon::now();

        // Formatea la fecha y hora como YYYY-MM-DD HH:mm:ss
        $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');

        if ($partida->fecha_valorizado === null) {
            $partida->update(['fecha_valorizado' => $formattedDateTime]);

            return redirect()->back()->with('mensaje', 'Registro actualizado correctamente.');
        } else {
            return redirect()->back()->with('error', 'La fecha ya ha sido establecida previamente.');
        }
    }

    public function checkLiberado(Partida $partida)
    {
        // Obtiene la fecha y hora actual
        $currentDateTime = Carbon::now();

        // Formatea la fecha y hora como YYYY-MM-DD HH:mm:ss
        $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');

        if ($partida->fecha_liberado === null) {
            $partida->update(['fecha_liberado' => $formattedDateTime]);

            return redirect()->back()->with('mensaje', 'Registro actualizado correctamente.');
        } else {
            return redirect()->back()->with('error', 'La fecha ya ha sido establecida previamente.');
        }
    }

    public function checkColocado(Partida $partida)
    {
        // Obtiene la fecha y hora actual
        $currentDateTime = Carbon::now();

        // Formatea la fecha y hora como YYYY-MM-DD HH:mm:ss
        $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');

        if ($partida->fecha_colocado === null) {
            $partida->update(['fecha_colocado' => $formattedDateTime]);

            return redirect()->back()->with('mensaje', 'Registro actualizado correctamente.');
        } else {
            return redirect()->back()->with('error', 'La fecha ya ha sido establecida previamente.');
        }
    }
}

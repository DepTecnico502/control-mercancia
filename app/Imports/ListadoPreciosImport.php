<?php

namespace App\Imports;

use App\Models\ListadoPrecio;
use Maatwebsite\Excel\Concerns\ToModel;

class ListadoPreciosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Si la fila está vacía, no se procesa
        if (empty($row[0])) {
            return null;
        }

        $listadoPrecios = ListadoPrecio::where('codigo', $row[0])->first();

        if ($listadoPrecios) {
            // Si el listadoPrecios existe, actualizamos sus datos
            $listadoPrecios->update([
                'descripcion' => $row[1],
                'existencias' => $row[2],
                'codigo_barras' => $row[3],
                'grupo_articulos' => $row[4],
                'fabricante' => $row[5],
                'unidad_de_medida' => $row[6],
                'ultimo_precio_compra' => $row[7],
                'ultimo_precio_entrada_mercancia' => $row[8],
                'inusual' => $row[9],
                'frecuente' => $row[10],
                'mayorista' => $row[11],
                'socio' => $row[12],
            ]);
        } else {
            // Si el proveedor no existe, lo creamos
            $listadoPrecios = ListadoPrecio::create([
                'codigo' => $row[0],
                'descripcion' => $row[1],
                'existencias' => $row[2],
                'codigo_barras' => $row[3],
                'grupo_articulos' => $row[4],
                'fabricante' => $row[5],
                'unidad_de_medida' => $row[6],
                'ultimo_precio_compra' => $row[7],
                'ultimo_precio_entrada_mercancia' => $row[8],
                'inusual' => $row[9],
                'frecuente' => $row[10],
                'mayorista' => $row[11],
                'socio' => $row[12],
            ]);
        }

        return $listadoPrecios;
    }
}

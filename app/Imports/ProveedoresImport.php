<?php

namespace App\Imports;

use App\Models\Proveedor;
use Maatwebsite\Excel\Concerns\ToModel;

class ProveedoresImport implements ToModel
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

        $proveedor = Proveedor::where('codigo', $row[0])->first();

        if ($proveedor) {
            // Si el proveedor existe, actualizamos sus datos
            $proveedor->update([
                'proveedor' => $row[1],
            ]);
        } else {
            // Si el proveedor no existe, lo creamos
            $proveedor = Proveedor::create([
                'codigo' => $row[0],
                'proveedor' => $row[1],
            ]);
        }

        return $proveedor;
    }
}

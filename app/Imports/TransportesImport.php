<?php

namespace App\Imports;

use App\Models\Transporte;
use Maatwebsite\Excel\Concerns\ToModel;

class TransportesImport implements ToModel
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

        $transporte = Transporte::where('codigo', $row[0])->first();

        if ($transporte) {
            // Si el transporte existe, actualizamos sus datos
            $transporte->update([
                'transporte' => $row[1],
            ]);
        } else {
            // Si el transporte no existe, lo creamos
            $transporte = Transporte::create([
                'codigo' => $row[0],
                'transporte' => $row[1],
            ]);
        }

        return $transporte;
    }
}

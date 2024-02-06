<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecibidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('recibidos')->insert([
            'codigo' => 'R00001',
            'recibido' => 'Lider Bodega01',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('recibidos')->insert([
            'codigo' => 'R00002',
            'recibido' => 'Asistente 1 de b01',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        
        DB::table('recibidos')->insert([
            'codigo' => 'R00003',
            'recibido' => 'Asistente 2 de b01',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        
        DB::table('recibidos')->insert([
            'codigo' => 'R00004',
            'recibido' => 'Bodega 2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        
        DB::table('recibidos')->insert([
            'codigo' => 'R00005',
            'recibido' => 'Asistente B2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        
        DB::table('recibidos')->insert([
            'codigo' => 'R00006',
            'recibido' => 'Bodega 3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        
        DB::table('recibidos')->insert([
            'codigo' => 'R00007',
            'recibido' => 'Asistente B3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        
    }
}

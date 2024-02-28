<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ProveedorSeeder::class);
        $this->call(TransporteSeeder::class);
        $this->call(RecibidoSeeder::class);
        $this->call(RolSeeder::class);
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Edwin Mendez',
            'email' => 'elmendez@elcolonizador.net',
            'rol_id' => 1,
            'password' => '$2y$10$2njYqOj.0GYfEU4W1gKPQeK1m/CqvyW8PSfLPPBZ7HQasaRS8/n0S'
        ]);
    }
}

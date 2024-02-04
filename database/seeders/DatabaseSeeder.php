<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            CategoriasSeeder::class,
            BodegasSeeder::class,
            MarcasSeeder::class,
            ProveedoressSeeder::class,
            ProductosSeeder::class,
            MarcasProductosSeeder::class,
            BodegasProductosSeeder::class,
            EntradasSeeder::class,
            SalidasSeeder::class
        ]);
    }
}

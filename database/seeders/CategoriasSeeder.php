<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'nombre' => 'Dormitorio'
            ],
            [
                'nombre' => 'Sala de estar'
            ],
            [
                'nombre' => 'Comedor'
            ],
            [
                'nombre' => 'Cocina'
            ],
            [
                'nombre' => 'Oficina'
            ]
        );
        DB::table('categorias')->insert($data);
    }
}

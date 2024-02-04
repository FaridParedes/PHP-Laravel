<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductosSeeder extends Seeder
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
            'nombre' => 'Cama matrimonial',
            'id_categoria' => 1,
            'precio' => 600.00
        ],
        [
            'nombre' => 'Armario de Roble',
            'id_categoria' => 1,
            'precio' => 250.00
        ],
        [
            'nombre' => 'Sofa de cuero',
            'id_categoria' => 2,
            'precio' => 350.25
        ],
        [
            'nombre' => 'Mesa de centro',
            'id_categoria' => 2,
            'precio' => 149.99
        ],
        [
            'nombre' => 'Mesa de comedor + sillas',
            'id_categoria' => 3,
            'precio' => 499.99
        ],
        [
            'nombre' => 'Minibar',
            'id_categoria' => 3,
            'precio' => 135.45
        ],
        [
            'nombre' => 'Mueble de cocina',
            'id_categoria' => 4,
            'precio' => 245.00
        ],
        [
            'nombre' => 'Escritorio ejecutivo',
            'id_categoria' => 5,
            'precio' => 425.30
        ]
    );
    DB::table('productos')->insert($data);
    }
}

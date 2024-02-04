<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BodegasProductosSeeder extends Seeder
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
                'id_producto' => 1,
                'id_bodega' => 1,
                'cantidad' => 3
            ],
            [
                'id_producto' => 1,
                'id_bodega' => 2,
                'cantidad' => 3
            ],
            [
                'id_producto' => 1,
                'id_bodega' => 3,
                'cantidad' => 2
            ],
            [
                'id_producto' => 2,
                'id_bodega' => 4,
                'cantidad' => 10
            ],
            [
                'id_producto' => 2,
                'id_bodega' => 1,
                'cantidad' => 5
            ],
            [
                'id_producto' => 3,
                'id_bodega' => 3,
                'cantidad' => 7
            ],
            [
                'id_producto' => 4,
                'id_bodega' => 1,
                'cantidad' => 6
            ],
            [
                'id_producto' => 4,
                'id_bodega' => 4,
                'cantidad' => 3
            ],
            [
                'id_producto' => 5,
                'id_bodega' => 1,
                'cantidad' => 3
            ],
            [
                'id_producto' => 5,
                'id_bodega' => 3,
                'cantidad' => 8
            ],
            [
                'id_producto' => 5,
                'id_bodega' => 2,
                'cantidad' => 4
            ],
            [
                'id_producto' => 6,
                'id_bodega' => 2,
                'cantidad' => 6
            ],
            [
                'id_producto' => 7,
                'id_bodega' => 1,
                'cantidad' => 2
            ],
            [
                'id_producto' => 7,
                'id_bodega' => 2,
                'cantidad' => 3
            ],
            [
                'id_producto' => 7,
                'id_bodega' => 3,
                'cantidad' => 6
            ],
            [
                'id_producto' => 7,
                'id_bodega' => 4,
                'cantidad' => 7
            ],
            [
                'id_producto' => 8,
                'id_bodega' => 1,
                'cantidad' => 6
            ],
            [
                'id_producto' => 8,
                'id_bodega' => 4,
                'cantidad' => 5
            ]
        );
        DB::table('bodegasproductos')->insert($data);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EntradasSeeder extends Seeder
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
                'id_proveedor' => 1,
                'id_bodega' => 1,
                'fecha' => '2023-05-16',
                'precio_adquisicion' => 450.00,
                'cantidad' => 3 
            ],
            [
                'id_producto' => 4,
                'id_proveedor' => 2,
                'id_bodega' => 4,
                'fecha' => '2023-05-15',
                'precio_adquisicion' => 99.99 ,
                'cantidad' => 3
            ],
            [
                'id_producto' => 5,
                'id_proveedor' => 3,
                'id_bodega' => 3,
                'fecha' => '2023-05-16',
                'precio_adquisicion' => 350 ,
                'cantidad' => 8
            ],
            [
                'id_producto' => 6,
                'id_proveedor' => 4,
                'id_bodega' => 2,
                'fecha' => '2023-05-16',
                'precio_adquisicion' => 75.00,
                'cantidad' => 6
            ],
            [
                'id_producto' => 7,
                'id_proveedor' => 1,
                'id_bodega' => 4,
                'fecha' => '2023-05-16',
                'precio_adquisicion' => 175 ,
                'cantidad' => 7
            ]
        );
        DB::table('entradas')->insert($data);
    }
}

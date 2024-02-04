<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalidasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            [
                'id_producto' => 2,
                'id_bodega' => 1,
                'fecha' => "2023-05-09",
                'cantidad' => 2
            ],
            [
                'id_producto' => 3,
                'id_bodega' => 2,
                'fecha' => "2023-05-10",
                'cantidad' => 1
            ],
            [
                'id_producto' => 8,
                'id_bodega' => 3,
                'fecha' => "2023-05-11",
                'cantidad' => 5
            ],
            [
                'id_producto' => 4,
                'id_bodega' => 4,
                'fecha' => "2023-05-12",
                'cantidad' => 3
            ],
            [
                'id_producto' => 5,
                'id_bodega' => 4,
                'fecha' => "2023-05-13",
                'cantidad' => 2
            ]
        );

        DB::table('salidas')->insert($data);
    }
}

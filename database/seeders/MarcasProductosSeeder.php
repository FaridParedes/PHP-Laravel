<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MarcasProductosSeeder extends Seeder
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
                'id_producto' => '1',
                'id_marca' => '1'
            ],
            [
                'id_producto' => '1',
                'id_marca' => '2'
            ],
            [
                'id_producto' => '2',
                'id_marca' => '1'
            ],
            [
                'id_producto' => '3',
                'id_marca' => '2'
            ],
            [
                'id_producto' => '4',
                'id_marca' => '2'
            ],
            [
                'id_producto' => '5',
                'id_marca' => '3'
            ],
            [
                'id_producto' => '6',
                'id_marca' => '3'
            ],
            [
                'id_producto' => '7',
                'id_marca' => '4'
            ],
            [
                'id_producto' => '8',
                'id_marca' => '4'
            ]
        );
        DB::table('marcasproductos')->insert($data);
    }
}

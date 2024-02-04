<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BodegasSeeder extends Seeder
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
                'nombre' => 'Bodega A',
                'ubicacion' => 'Santa Tecla'
            ],
            [
                'nombre' => 'Bodega B',
                'ubicacion' => 'San Salvador'
            ],
            [
                'nombre' => 'Bodega C',
                'ubicacion' => 'San Miguel'
            ],
            [
                'nombre' => 'Bodega D',
                'ubicacion' => 'Santa Ana'
            ]
        );
        DB::table('bodegas')->insert($data);
    }
}

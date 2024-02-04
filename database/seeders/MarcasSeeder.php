<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MarcasSeeder extends Seeder
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
                'nombre' => 'Marca A'
            ],
            [
                'nombre' => 'Marca B'
            ],
            [
                'nombre' => 'Marca C'
            ],
            [
                'nombre' => 'Marca D'
            ]
        );
        DB::table('marcas')->insert($data);
    }
}

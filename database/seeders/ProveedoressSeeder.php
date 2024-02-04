<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedoressSeeder extends Seeder
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
                'nombre' => 'Proveedor A',
                'email' => 'proveedora@correo.com',
                'telefono' => '12345678'
            ],
            [
                'nombre' => 'Proveedor B',
                'email' => 'proveedorb@correo.com',
                'telefono' => '87654321'
            ],
            [
                'nombre' => 'Proveedor C',
                'email' => 'proveedorc@correo.com',
                'telefono' => '24681012'
            ],
            [
                'nombre' => 'Proveedor D',
                'email' => 'proveedord@correo.com',
                'telefono' => '01357911'
            ]
        );
        DB::table('proveedores')->insert($data);
    }
}

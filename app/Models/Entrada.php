<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    public $timestamps = false;

    //Nombre de la tabla
    protected $table = 'entradas';

    //Llave primaria de mi tabla
    protected $primaryKey = 'codigo';

    //Campos de la tabla 
    protected $fillable = ['id_producto', 'id_proveedor', 'id_bodega','fecha','precio_adquisicion','cantidad'];
}

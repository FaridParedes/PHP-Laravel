<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarcaProducto extends Model
{
    use HasFactory;

    public $timestamps = false;

    //Nombre de la tabla
    protected $table = 'marcasproductos';

    //Campos de la tabla 
    protected $fillable = ['id_producto', 'id_marca'];
}

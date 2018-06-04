<?php

namespace SisBezaFest;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //referencia a la tabla articulo//
    protected $table='empresa';
    //su llave primaria //
    protected $primaryKey='id';
    //para agregar dos columnas de creación y de actualización//
    public $timestamps=false;
    //campos que reciben un valor para despues ser almacenados//
    protected $fillable=[
        'ruc',
        'razon_social',
        'nombre_empresa',
        'direccion',
        'celular',
        'telefono',
        'correo'
        
    ];
    //campos que no queremos que se asigne al modelo//
    protected $guarded = [
        'numero_cuenta',
        'Estado_id',
        'persona_id'
    ];
}

<?php

namespace SisBezaFest;

use Illuminate\Database\Eloquent\Model;

class TipoComprobante extends Model
{
    //referencia a la tabla articulo//
    protected $table='comprobante';
    //su llave primaria //
    protected $primaryKey='id';
    //para agregar dos columnas de creación y de actualización//
    public $timestamps=false;
    //campos que reciben un valor para despues ser almacenados//
    protected $fillable=[
        'tipo_comprobante'
    ];
    //campos que no queremos que se asigne al modelo//
    protected $guarded = [

    ];
}

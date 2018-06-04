<?php

namespace SisBezaFest;

use Illuminate\Database\Eloquent\Model;

class TipoPersona extends Model
{
    //
    //referencia a la tabla articulo//
    protected $table='tipo_persona';
    //su llave primaria //
    protected $primaryKey='id';
    //para agregar dos columnas de creación y de actualización//
    public $timestamps=false;
    //campos que reciben un valor para despues ser almacenados//
    protected $fillable=[
        'tipo_persona'
    ];
    //campos que no queremos que se asigne al modelo//
    protected $guarded = [

    ];
}

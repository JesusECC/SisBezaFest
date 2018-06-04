<?php

namespace SisBezaFest;

use Illuminate\Database\Eloquent\Model;
use SisBezaFest\Usuario;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SisBezaFest\Http\Requests\PersonaFormRequest;
use DB;

class Persona extends Model
{
    //
    //referencia a la tabla articulo//
    protected $table='persona';
    //su llave primaria //
    protected $primaryKey='id';
    //para agregar dos columnas de creación y de actualización//
    public $timestamps=false;
    //campos que reciben un valor para despues ser almacenados//
    protected $fillable=[
        'num_docum',
        'nombres',
        'ap_paterno',
        'ap_materno',
        'celular',
        'telefono',
        'sexo',
        'direccion',
        'correo',
        'fech_nacimiento',
        'edad',
        'tipo_documento_id',
        'Estado_id',
        'tipo_persona_id'

        

    ];
    //campos que no queremos que se asigne al modelo//
    protected $guarded = [

    ];
}

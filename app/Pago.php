<?php

namespace SisBezaFest;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table='pago';
     //su llave primaria //
     protected $primaryKey='id';
     //para agregar dos columnas de creación y de actualización//
     public $timestamps=false;
     //campos que reciben un valor para despues ser almacenados//
     protected $fillable=[
         'cod_pago',
         'tipo_pago_id',
         'cliente_id'

     ];
     //campos que no queremos que se asigne al modelo//
     protected $guarded = [
 
     ];
}

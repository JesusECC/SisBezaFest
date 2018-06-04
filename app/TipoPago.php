<?php

namespace SisBezaFest;

use Illuminate\Database\Eloquent\Model;

class TipoPago extends Model
{
   //referencia a la tabla articulo//
   protected $table='tipo_pago';
   //su llave primaria //
   protected $primaryKey='id';
   //para agregar dos columnas de creación y de actualización//
   public $timestamps=false;
   //campos que reciben un valor para despues ser almacenados//
   protected $fillable=[
       'nombre'
   ];
   //campos que no queremos que se asigne al modelo//
   protected $guarded = [

   ];
}

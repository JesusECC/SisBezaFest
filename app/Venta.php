<?php

namespace SisBezaFest;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
     //referencia a la tabla articulo//
     protected $table='venta';
     //su llave primaria //
     protected $primaryKey='id';
     //para agregar dos columnas de creación y de actualización//
     public $timestamps=false;
     //campos que reciben un valor para despues ser almacenados//
     protected $fillable=[
         'codigo',
         'fech_venta',
         'estado',
         'comprobante_id',
         'pago_id',
         'Estado_id'
     ];
     //campos que no queremos que se asigne al modelo//
     protected $guarded = [
 
     ];
}

<?php

namespace SisBezaFest;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
     protected $table='paquete';
     //su llave primaria //
     protected $primaryKey='id';
     //para agregar dos columnas de creación y de actualización//
     public $timestamps=false;
     //campos que reciben un valor para despues ser almacenados//
     protected $fillable=[
         'nombre',
         'imagen',
         'descripcion',
         'precio',
         'cantidad',
         'nr_personas',
         'tipo_paquete_id',
         'evento_id',

     ];
     //campos que no queremos que se asigne al modelo//
     protected $guarded = [
 
     ];
}

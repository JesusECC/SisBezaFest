<?php

namespace SisBezaFest;

use Illuminate\Database\Eloquent\Model;

class Preventa extends Model
{
     protected $table='preventas';
     //su llave primaria //
     protected $primaryKey='id';
     //para agregar dos columnas de creación y de actualización//
     public $timestamps=false;
     //campos que reciben un valor para despues ser almacenados//
     protected $fillable=[
         'codigo',
         'nombre',
         'porcentaje',
         'fecha_inicio',
         'fecha_fin',
         'Estado_id',
         'paquete_id',
         'evento_id',

     ];
     //campos que no queremos que se asigne al modelo//
     protected $guarded = [
 
     ];    
}

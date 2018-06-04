<?php

namespace SisBezaFest;

use Illuminate\Database\Eloquent\Model;

class Tipopaquete extends Model
{
   protected $table='tipo_paquete';
   //su llave primaria //
   protected $primaryKey='id';
   //para agregar dos columnas de creación y de actualización//
   public $timestamps=false;
   //campos que reciben un valor para despues ser almacenados//
   protected $fillable=[
       'nom_paquete',
       'estado'
   ];
   //campos que no queremos que se asigne al modelo//
   protected $guarded = [

   ];    
}

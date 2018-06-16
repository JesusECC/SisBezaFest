<?php

namespace SisBezaFest;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    //referencia a la tabla articulo//
    protected $table='detalle_venta';
    //su llave primaria //
    protected $primaryKey='id';
    //para agregar dos columnas de creación y de actualización//
    public $timestamps=false;
    //campos que reciben un valor para despues ser almacenados//
    protected $fillable=[
        'total',
        'descripcion',
        'cantidad',
        'precio',
        'paquete_id',
        'venta_id'        
    ];
    //campos que no queremos que se asigne al modelo//
    protected $guarded = [
       // 'numero_cuenta',
       // 'Estado_id',
       // 'persona_id'
    ];
}

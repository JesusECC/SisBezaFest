<?php

namespace SisBezaFest\Http\Controllers;
use SisBezaFest\Pago;
use Illuminate\Http\Request;
use DB;
class PagoController extends Controller
{
    //
    public function create($cod_pago,$tipo_pago1,$cliente){

        $preventas=new Preventa;
        $preventas->cod_pago=$cod_pago;
        $preventas->tipo_pago_id=$tipo_pago1;
        $preventas->cliente_id=$cliente;
        $preventas->save();
    }
}

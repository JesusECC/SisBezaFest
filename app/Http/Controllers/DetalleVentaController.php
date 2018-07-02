<?php

namespace SisBezaFest\Http\Controllers;
use SisBezaFest\DetalleVenta;
use Illuminate\Http\Request;
use SisBezaFest\Http\Requests\DetalleVentaFormRequest;
use Illuminate\Support\Facades\Auth;
use DB;
class DetalleVentaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {   
        //dd(Auth::id());
        $idper=DB::table('persona')
            ->where("users_id","=",Auth::id())
            ->get();
        $idu=$idper[0]->id;
        
        $detalleVenta=DB::table('detalle_venta as dv')
        ->join("paquete as p","p.id","=","dv.paquete_id")
        ->join("venta as v","v.id","=","dv.venta_id")
        ->join("pago as pa","pa.id","=","v.pago_id")
        ->join("cliente as c","c.id","=","pa.cliente_id")
        ->where("c.persona_id","=",$idu)
        ->select("dv.cantidad","dv.precio","dv.total","p.nombre","p.estado")
        ->get();
        return view("main.listaCompras",['detalleVenta'=>$detalleVenta]);
    
    }
}

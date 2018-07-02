<?php

namespace SisBezaFest\Http\Controllers;
use SisBezaFest\DetalleVenta;
use Illuminate\Http\Request;
use SisBezaFest\Http\Requests\DetalleVentaFormRequest;
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
        dd(Session::all());
        $detalleVenta=DB::table('detalle_venta as dv')
        ->join("paquete as p","p.id","=","dv.paquete_id")
        ->select("dv.cantidad","dv.precio","dv.total","p.nombre","p.estado")
        ->get();
        return view("main.listaCompras",['detalleVenta'=>$detalleVenta]);
    
    }
}

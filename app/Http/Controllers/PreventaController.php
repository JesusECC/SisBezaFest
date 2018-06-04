<?php

namespace SisBezaFest\Http\Controllers;

use Illuminate\Http\Request;
use SisBezaFest\Preventa;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SisBezaFest\Http\Requests\PreventaFormRequest;
use DB;

class PreventaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request)
        {   
            //busquedas por articulo el trim para quitar los espacios tanto como al principio y al final
            //filtro de busqueda
            $query=trim($request->get('searchText'));
            //sentencia sql en laravel donde where necesita 3 parametros 
            $preventas=DB::table('preventas as p')
            ->join('estado as e','p.Estado_id','=','e.id')
            ->join('paquete as pa','p.paquete_id','=','pa.id')
            ->select('p.codigo','p.paquete_id','p.nombre','p.porcentaje','p.fecha_inicio','p.fecha_fin','e.nombre as estado','pa.nombre as paquete','p.id')
            ->where('p.nombre','LIKE','%'.$query.'%')
            ->where('p.Estado_id','=',1)
            ->orderBy('p.id','asc')
            ->paginate(7);
            return view("partner.preventa.index",['preventas'=>$preventas,'searchText'=>$query]);
        }  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paquete=DB::table('paquete')->where('estado','=','Activo')->get();
        return view("partner.preventa.create",["paquete"=>$paquete]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PreventaFormRequest $request)
    {
        $preventas=new Preventa;
        $preventas->paquete_id=$request->get('paquete_id');
        $preventas->codigo=$request->get('codigo');
        $preventas->nombre=$request->get('nombre');
        $preventas->porcentaje=$request->get('porcentaje');
        $preventas->fecha_inicio=$request->get('fecha_inicio');
        $preventas->fecha_fin=$request->get('fecha_fin');
        $preventas->Estado_id=1;
        $preventas->save();
        return Redirect::to('partner/preventa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("partner.preventa.show",["preventas"=>Evento::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $preventas=Preventa::findOrFail($id);
        $paquete=DB::table('paquete')->where('estado','=','Activo')->get();
        return view("partner.preventa.edit",["preventas"=>$preventas,"paquete"=>$paquete]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PreventaFormRequest $request, $id)
    {
        $preventas=Preventa::findOrFail($id);
        $preventas->paquete_id=$request->get('paquete_id');
        $preventas->codigo=$request->get('codigo');
        $preventas->nombre=$request->get('nombre');
        $preventas->porcentaje=$request->get('porcentaje');
        $preventas->fecha_inicio=$request->get('fecha_inicio');
        $preventas->fecha_fin=$request->get('fecha_fin');
        $preventas->update();
        return Redirect::to('partner/preventa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $preventas=Preventa::findOrFail($id);
        $preventas->Estado_id=0;
        $preventas-> update(); 
        return Redirect::to('partner/preventa');
    }
}

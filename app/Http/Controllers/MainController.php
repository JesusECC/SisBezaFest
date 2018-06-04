<?php

namespace SisBezaFest\Http\Controllers;

use Illuminate\Http\Request;
use SisBezaFest\Evento;
use SisBezaFest\Paquete;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SisBezaFest\Http\Requests\EventoFormRequest;
use DB;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            //busquedas por categoria el trim para quitar los espacios tanto como al principio y al final
            //filtro de busqueda
            $query=trim($request->get('searchText'));
            //sentencia sql en laravel donde where necesita 3 parametros 
            $evento=DB::table('evento as e')
            ->join('empresa as em','e.empresa_id','=','em.id')
            ->join('estado as es','e.Estado_id','=','es.id')
            ->select('e.id','e.nombre','e.fecha_creacion','e.fecha','e.hora','e.direccion','e.aforo','e.tipo_evento','e.descripcion','e.imagen','es.nombre as estado','em.nombre_empresa as empresa')
            ->where('e.nombre','LIKE','%'.$query.'%')
            ->where('e.Estado_id','=',1)
            ->orderBy('e.id','asc')
            ->paginate(7);
            return view("main.index",['evento'=>$evento,'searchText'=>$query]);
        }
    }
    public function paquete($id)
    {
            $paquete=DB::table('paquete as p')
            ->join('evento as e','p.evento_id','=','e.id')
            ->join('tipo_paquete as tp','tp.id','=','p.tipo_paquete_id')
            ->select('p.id','p.nombre as nombrePa','e.nombre as nombreEv','p.imagen','p.descripcion','p.precio','p.cantidad','p.nr_personas','e.nombre as evento','p.estado','tp.nom_paquete')
            ->where('p.evento_id','=',$id)
            ->orderBy('p.id','asc')
            ->paginate(7);
            return view("main.paquete",["paquete"=>$paquete]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

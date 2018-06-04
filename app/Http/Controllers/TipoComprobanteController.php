<?php

namespace SisBezaFest\Http\Controllers;

use Illuminate\Http\Request;
use SisBezaFest\TipoComprobante;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SisBezaFest\Http\Requests\TipoComprobanteRequest;
use DB;

class TipoComprobanteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        if ($request) {
            //busquedas por categoria el trim para quitar los espacios tanto como al principio y al final
            //filtro de busqueda
            $query=trim($request->get('searchText'));
            //sentencia sql en laravel donde where necesita 3 parametros 
            $tipocomprobante=DB::table('comprobante')
            ->where('tipo_comprobante','LIKE','%'.$query.'%')
            ->orderBy('id','asc')
            ->paginate(7);
            return view("administrador.comprobante.index",['tipocomprobante'=>$tipocomprobante,'searchText'=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("administrador.comprobante.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoComprobanteRequest $request)
    {
        //
        $tipocomprobante=new TipoComprobante;
        $tipocomprobante->tipo_comprobante=$request->get('comprobante');
        $tipocomprobante->save();
        return Redirect::to('administrador/comprobante');
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
        return view("administrador.comprobante.show",["tipocomprobante"=>TipoComprobante::findOrFail($id)]);
        
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
        return view("administrador.comprobante.edit",["tipocomprobante"=>TipoComprobante::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoComprobanteRequest $request, $id)
    {
        //
        $tipocomprobante=TipoComprobante::findOrFail($id);
        $tipocomprobante->tipo_comprobante=$request->get('tipo_comprobante');
        $tipocomprobante->update();
        return Redirect::to('administrador/comprobante');
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
       //TipoComprobante::destroy($id);
       $tipocomprobante=TipoComprobante::findOrFail($id);
	   $tipocomprobante -> delete(); 
       return Redirect::to('administrador/comprobante');
    }
}

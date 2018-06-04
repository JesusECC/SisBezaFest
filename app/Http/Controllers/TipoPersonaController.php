<?php

namespace SisBezaFest\Http\Controllers;

use Illuminate\Http\Request;
use SisBezaFest\TipoPersona;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SisBezaFest\Http\Requests\TipopersonaFormRequest;
use DB;
class TipoPersonaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request){
            //busquedas por categoria el trim para quitar los espacios tanto como al principio y al final
            //filtro de busqueda
            $query=trim($request->get('searchText'));
            //sentencia sql en laravel donde where necesita 3 parametros 
            $tipopersona=DB::table('tipo_persona')
            ->where('tipo_persona','LIKE','%'.$query.'%')
            ->orderBy('id','asc')
            ->paginate(7);
            return view("administrador.tipopersona.index",['tipopersona'=>$tipopersona,'searchText'=>$query]);
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
        return view("administrador.tipopersona.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipopersonaFormRequest $request)
    {
        //
        $tipopersona=new TipoPersona;
        $tipopersona->tipo_persona=$request->get('persona');
        $tipopersona->save();
        return Redirect::to('administrador/tipopersona');
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
        return view("administrador.tipopersona.show",["tipoPersona"=>TipoPersona::findOrFail($id)]);
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
        return view("administrador.tipopersona.edit",["tipoPersona"=>TipoPersona::findOrFail($id)]);
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
        $tipopersona=TipoPersona::findOrFail($id);
        $tipopersona->tipo_persona=$request->get('tipopersona');
        $tipopersona->update();
        return Redirect::to('administrador/tipopersona');
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
        $tipopersona=TipoPersona::findOrFail($id);
        $tipopersona->delete();
        return Redirect::to('administrador/tipopersona');
    }
}

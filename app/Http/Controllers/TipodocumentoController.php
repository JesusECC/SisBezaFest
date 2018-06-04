<?php

namespace SisBezaFest\Http\Controllers;

use Illuminate\Http\Request;
use SisBezaFest\Tipodocumento;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SisBezaFest\Http\Requests\TipodocumentoFormRequest;
use DB;

class TipodocumentoController extends Controller
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
        if($request)
        {   
            //busquedas por categoria el trim para quitar los espacios tanto como al principio y al final
            //filtro de busqueda
            $query=trim($request->get('searchText'));
            //sentencia sql en laravel donde where necesita 3 parametros 
            $tipodocumento=DB::table('tipo_documento')
            ->where('tipo_doc','LIKE','%'.$query.'%')
            ->where('condicion','=','1')  
            ->orderBy('id','asc')
            ->paginate(7);
            return view("partner.tipodocumento.index",['tipodocumento'=>$tipodocumento,'searchText'=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("partner.tipodocumento.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipodocumentoFormRequest $request)
    {
        $tipodocumento=new Tipodocumento;
        $tipodocumento->tipo_doc=$request->get('tipo_doc');
        $tipodocumento->descripcion=$request->get('descripcion');
        $tipodocumento->condicion='1';
        $tipodocumento->save();
        return Redirect::to('administrador/tipodocumento');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("administrador.tipodocumento.show",["tipodocumento"=>Tipodocumento::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("administrador.tipodocumento.edit",["tipodocumento"=>Tipodocumento::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipodocumentoFormRequest $request, $id)
    {
        $tipodocumento=Tipodocumento::findOrFail($id);
        $tipodocumento->tipo_doc=$request->get('tipo_doc');
        $tipodocumento->descripcion=$request->get('descripcion');
        $tipodocumento->update();
        return Redirect::to('administrador/tipodocumento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipodocumento=Tipodocumento::findOrFail($id);
        $tipodocumento->condicion='0';
        $tipodocumento->update();
        return Redirect::to('administrador/tipodocumento');
    }
}

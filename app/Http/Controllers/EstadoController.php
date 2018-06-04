<?php

namespace SisBezaFest\Http\Controllers;

use Illuminate\Http\Request;
use SisBezaFest\Estado;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SisBezaFest\Http\Requests\EstadoFormRequest;
use DB;
class EstadoController extends Controller
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
    public function index(Request $request)
    {
        if ($request) {
            //busquedas por categoria el trim para quitar los espacios tanto como al principio y al final
            //filtro de busqueda
            $query=trim($request->get('searchText'));
            //sentencia sql en laravel donde where necesita 3 parametros 
            $estado=DB::table('estado')
            ->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('id','asc')
            ->paginate(7);
            return view("administrador.estado.index",['estado'=>$estado,'searchText'=>$query]);
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
        return view("administrador.estado.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstadoFormRequest $request)
    {
        //
        $estado=new Estado;
        $estado->nombre=$request->get('estado');
        $estado->save();
        return Redirect::to('administrador/estado');
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
        return view("administrador.estado.show",["estado"=>Estado::findOrFail($id)]);
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
        return view("administrador.estado.edit",["estado"=>Estado::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EstadoFormRequest $request, $id)
    {
        //
        $estado=Estado::findOrFail($id);
        $estado->nombre=$request->get('estado');
        $estado->update();
        return Redirect::to('administrador/estado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estado=Estado::findOrFail($id);
        $estado -> delete(); 
        return Redirect::to('administrador/estado');
    }
}

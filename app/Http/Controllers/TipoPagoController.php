<?php

namespace SisBezaFest\Http\Controllers;

use Illuminate\Http\Request;
use SisBezaFest\TipoPago;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SisBezaFest\Http\Requests\TipoPagoFormRequest;
use DB;
class TipoPagoController extends Controller
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
        if($request){
            //busquedas por categoria el trim para quitar los espacios tanto como al principio y al final
            //filtro de busqueda
            $query=trim($request->get('searchText'));
            //sentencia sql en laravel donde where necesita 3 parametros 
            $tipopago=DB::table('tipo_pago')
            ->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('id','asc')
            ->paginate(7);
            return view("administrador.tipopago.index",['tipopago'=>$tipopago,'searchText'=>$query]);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //redirecciona a la vista create
        return view("administrador.tipopago.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoPagoFormRequest $request)
    {
        //
        $tipopago=new TipoPago;
        $tipopago->nombre=$request->get('tipopago');
        $tipopago->save();
        return Redirect::to('administrador/tipopago');
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
        return view("administrador.tipopago.show",["tipoPago"=>TipoPago::findOrFail($id)]);
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
        return view("administrador.tipopago.edit",["tipoPago"=>TipoPago::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoPagoFormRequest $request, $id)
    {
        //
        $tipopago=TipoPago::findOrFail($id);
        $tipopago->nombre=$request->get('tipopago');
        $tipopago->update();
        return Redirect::to('administrador/tipopago');
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
        $tipopago=TipoPago::findOrFail($id);;
	    $tipopago -> delete(); 
        return Redirect::to('administrador/tipopago');
    }
}

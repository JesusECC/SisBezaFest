<?php

namespace SisBezaFest\Http\Controllers;

use Illuminate\Http\Request;
use SisBezaFest\Tipopaquete;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SisBezaFest\Http\Requests\TipopaqueteFormRequest;
use DB;

class TipopaqueteController extends Controller
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
            $tipo_paquete=DB::table('tipo_paquete')
            ->where('nom_paquete','LIKE','%'.$query.'%')
            ->where('estado','=',1)
            ->orderBy('id','asc')
            ->paginate(7);
            return view("partner.tipopaquete.index",['tipo_paquete'=>$tipo_paquete,'searchText'=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view("partner.tipopaquete.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipopaqueteFormRequest $request)
    {
        $tipo_paquete=new Tipopaquete;
        $tipo_paquete->nom_paquete=$request->get('nom_paquete');
        $tipo_paquete->estado=1;
        $tipo_paquete->save();
        return Redirect::to('partner/tipopaquete');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("partner.tipopaquete.show",["tipo_paquete"=>Tipopaquete::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view("partner.tipopaquete.edit",["tipo_paquete"=>Tipopaquete::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipopaqueteFormRequest $request, $id)
    {
        $tipo_paquete=Tipopaquete::findOrFail($id);
        $tipo_paquete->nom_paquete=$request->get('nom_paquete');
        $tipo_paquete->update();
        return Redirect::to('partner/tipopaquete');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_paquete=Tipopaquete::findOrFail($id);
        $tipo_paquete->estado=0;
        $tipo_paquete-> update(); 
        return Redirect::to('partner/tipopaquete');
    }
}

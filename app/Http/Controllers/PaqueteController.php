<?php

namespace SisBezaFest\Http\Controllers;

use Illuminate\Http\Request;
use SisBezaFest\Paquete;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SisBezaFest\Http\Requests\PaqueteFormRequest;
use DB;

class PaqueteController extends Controller
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
            $paquete=DB::table('paquete as p')
            ->join('evento as ev','p.evento_id','=','ev.id')
            ->join('tipo_paquete as tp','p.tipo_paquete_id','=','tp.id')
            ->select('p.id','p.nombre','p.imagen','p.descripcion','p.precio','p.cantidad','p.nr_personas','tp.nom_paquete as tipopaquete','ev.nombre as evento','p.estado','tp.id')
            ->where('p.nombre','LIKE','%'.$query.'%')
            ->where('p.estado','=','Activo')
            ->orderBy('p.id','asc')
            ->paginate(7);
            return view("partner.paquete.index",['paquete'=>$paquete,'searchText'=>$query]);
        }        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $evento=DB::table('evento')->where('Estado_id','=',1)->get();
        $tipo_paquete=DB::table('tipo_paquete')->get();
        return view("partner.paquete.create",["evento"=>$evento],["tipo_paquete"=>$tipo_paquete]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaqueteFormRequest $request)
    {
        $paquete=new Paquete;
        $paquete->tipo_paquete_id=$request->get('tipo_paquete_id');
        $paquete->evento_id=$request->get('evento_id');
        $paquete->nombre=$request->get('nombre');
        if (Input::hasFile('imagen')){
         $file=Input::file('imagen');
         $file->move(public_path().'/images/paquete/',$file->getClientOriginalName());
            $paquete->imagen=$file->getClientOriginalName();
        } 
        $paquete->descripcion=$request->get('descripcion');       
        $paquete->precio=$request->get('precio');
        $paquete->cantidad=$request->get('cantidad');
        $paquete->nr_personas=$request->get('nr_personas');
        $paquete->estado=1;
        $paquete->save();
        return Redirect::to('partner/paquete');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("partner.paquete.show",["paquete"=>Paquete::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paquete=Paquete::findOrFail($id);
        $evento=DB::table('evento')->where('Estado_id','=',1)->get();
        $tipo_paquete=DB::table('tipo_paquete')->get();
        return view("partner.paquete.edit",["paquete"=>$paquete,"evento"=>$evento],["tipo_paquete"=>$tipo_paquete]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaqueteFormRequest $request, $id)
    {
        $paquete=Paquete::findOrFail($id);
        $paquete->tipo_paquete_id=$request->get('tipo_paquete_id');
        $paquete->evento_id=$request->get('evento_id');
        $paquete->nombre=$request->get('nombre');
        if (Input::hasFile('imagen')){
         $file=Input::file('imagen');
         $file->move(public_path().'/images/paquete/',$file->getClientOriginalName());
            $paquete->imagen=$file->getClientOriginalName();
        } 
        $paquete->descripcion=$request->get('descripcion');       
        $paquete->precio=$request->get('precio');
        $paquete->cantidad=$request->get('cantidad');
        $paquete->nr_personas=$request->get('nr_personas');
        $paquete->estado='Activo';
        $paquete->update();
        return Redirect::to('partner/paquete');         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paquete=Paquete::findOrFail($id);
        $paquete->estado='Inactivo';
        $paquete->update();
        return Redirect::to('almacen/articulo'); 
    }
}

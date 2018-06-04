<?php

namespace SisBezaFest\Http\Controllers;

use Illuminate\Http\Request;
use SisBezaFest\Evento;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SisBezaFest\Http\Requests\EventoFormRequest;
use DB;
class EventoController extends Controller
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
            $evento=DB::table('evento as e')
            ->join('empresa as em','e.empresa_id','=','em.id')
            ->join('estado as es','e.Estado_id','=','es.id')
            ->select('e.id','e.nombre','e.fecha_creacion','e.fecha','e.hora','e.direccion','e.aforo','e.tipo_evento','e.descripcion','e.imagen','es.nombre as estado','em.nombre_empresa as empresa')
            ->where('e.nombre','LIKE','%'.$query.'%')
            ->where('e.Estado_id','=',1)
            ->orderBy('e.id','asc')
            ->paginate(7);
            return view("partner.evento.index",['evento'=>$evento,'searchText'=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("partner.evento.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventoFormRequest $request)
    {
        $evento=new Evento;
        $evento->nombre=$request->get('nombre');
        $evento->fecha_creacion=$request->get('fecha_creacion');
        $evento->fecha=$request->get('fecha');
        $evento->hora=$request->get('hora');
        $evento->direccion=$request->get('direccion');
        $evento->aforo=$request->get('aforo');
        $evento->tipo_evento=$request->get('tipo_evento');
        $evento->descripcion=$request->get('descripcion');
        if (Input::hasFile('imagen')){
         $file=Input::file('imagen');
         $file->move(public_path().'/images/eventos/',$file->getClientOriginalName());
            $evento->imagen=$file->getClientOriginalName();
        }
        $evento->Estado_id=1;
        $evento->empresa_id=$request->get('empresa_id');
        $evento->save();
        return Redirect::to('partner/evento');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("partner.evento.show",["evento"=>Evento::findOrFail($id)]);
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
        return view("partner.evento.edit",["evento"=>Evento::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventoFormRequest $request, $id)
    {
        //
        $evento=Evento::findOrFail($id);
        $evento->nombre=$request->get('nombre');
        $evento->fecha=$request->get('fecha');
        $evento->hora=$request->get('hora');
        $evento->aforo=$request->get('aforo');
        $evento->tipo_evento=$request->get('tipo_evento');
        $evento->descripcion=$request->get('descripcion');
        if (Input::hasFile('imagen')){
         $file=Input::file('imagen');
         $file->move(public_path().'/images/eventos/',$file->getClientOriginalName());
            $evento->imagen=$file->getClientOriginalName();
        }
        $evento->update();
        return Redirect::to('partner/evento');
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
        $evento=Evento::findOrFail($id);
        $evento->Estado_id='2';
        $evento-> update(); 
        return Redirect::to('partner/evento');
    }
}

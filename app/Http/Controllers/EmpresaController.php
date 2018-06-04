<?php

namespace SisBezaFest\Http\Controllers;

use Illuminate\Http\Request;
use SisBezaFest\Empresa;
use SisBezaFest\Persona;
use SisBezaFest\Estado;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SisBezaFest\Http\Requests\EmpresaFormRequest;
use DB;
class EmpresaController extends Controller
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
            $empresa=DB::table('empresa')
            ->where('ruc','LIKE','%'.$query.'%')
            ->orderBy('id','asc')
            ->paginate(7);
            return view("administrador.empresa.index",['empresa'=>$empresa,'searchText'=>$query]);
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
        return view("administrador.empresa.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaFormRequest $request)
    {
        //
        $empresa=new Empresa;
        $empresa->ruc=$request->get('ruc');
        $empresa->razon_social=$request->get('razon_social');
        $empresa->nombre_empresa=$request->get('nom_empresa');
        $empresa->direccion=$request->get('dir');
        $empresa->celular=$request->get('cel');
        $empresa->telefono=$request->get('tel');
        $empresa->correo=$request->get('gmail');
        $empresa->numero_cuenta=$request->get('n_cuenta');
        $empresa->Estado_id='1';
        $empresa->persona_id=$request->get('id_per');
        $empresa->save();
        return Redirect::to('administrador/empresa');
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
        return view("administrador.empresa.show",["empresa"=>Empresa::findOrFail($id)]);
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
        $estado=DB::table('estado')
        ->get();

        $persona=DB::table('persona')
       ->join('empresa','empresa.persona_id','=','persona.id')
       ->where('empresa.id','=',$id)
       ->select('persona.nombres')
       ->get();
        

        return view("administrador.empresa.edit",["empresa"=>Empresa::findOrFail($id),"estado"=>$estado,"persona"=>$persona]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaFormRequest $request, $id)
    {
        //
        $empresa=Empresa::findOrFail($id);
        $empresa->ruc=$request->get('ruc');
        $empresa->razon_social=$request->get('razon_social');
        $empresa->nombre_empresa=$request->get('nom_empresa');
        $empresa->direccion=$request->get('dir');
        $empresa->celular=$request->get('cel');
        $empresa->telefono=$request->get('tel');
        $empresa->correo=$request->get('gmail');
        $empresa->numero_cuenta=$request->get('n_cuenta');
        $empresa->Estado_id=$request->get('estado');
        $empresa->persona_id=$request->get('id_per');
        $empresa->update();
        return Redirect::to('administrador/empresa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa=Empresa::findOrFail($id);
        $empresa -> delete(); 
        return Redirect::to('administrador/empresa');
    }
    
    public function buscarpersona(Request $request)
    {
        if($request)
        {   
            //busquedas por categoria el trim para quitar los espacios tanto como al principio y al final
            //filtro de busqueda
            $query=trim($request->get('searchText'));
            //sentencia sql en laravel donde where necesita 3 parametros 
            $persona=DB::table('persona')
            ->where('num_docum','LIKE','%'.$query.'%')
            //->where('nombres','LIKE','%'.$query.'%')
            ->where('tipo_persona_id','=',1)   
            ->where('Estado_id','=',1)
            ->orderBy('id','asc')
            ->paginate(7);/*ese es el render*/
            return view("administrador.empresa.buscarpersona",['persona'=>$persona,'searchText'=>$query]);
        }

    } 
}

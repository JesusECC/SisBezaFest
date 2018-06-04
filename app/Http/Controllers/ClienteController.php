<?php

namespace SisBezaFest\Http\Controllers;
use Illuminate\Http\Request;
use SisBezaFest\Persona;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SisBezaFest\Http\Requests\PersonaFormRequest;
use DB;
class ClienteController extends Controller
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
        //
        if($request)
        {   
            //busquedas por categoria el trim para quitar los espacios tanto como al principio y al final
            //filtro de busqueda
            $query=trim($request->get('searchText'));
            //sentencia sql en laravel donde where necesita 3 parametros 
            $persona=DB::table('persona')
            ->where('num_docum','LIKE','%'.$query.'%')
            ->where('tipo_persona_id','=',2) 
            ->where('Estado_id','=',1)
            ->orderBy('id','asc')
            ->paginate(7);/*ese es el render*/
            return view("partner.clientes.index",['persona'=>$persona,'searchText'=>$query]);
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
        return view("partner.clientes.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonaFormRequest $request)
    {
        //
        $persona=new Persona;
        $persona->nombres=$request->get('nombre');
        $persona->ap_paterno=$request->get('ape_pater');
        $persona->ap_materno=$request->get('ape_mater');
        $persona->tipo_documento_id=$request->get('tipo_docu');
        $persona->num_docum=$request->get('num_doc');
        $persona->celular=$request->get('cel');
        $persona->telefono=$request->get('tele');
        $persona->sexo=$request->get('sexo');
        $persona->direccion=$request->get('dire');
        $persona->correo=$request->get('gmail');
        $persona->fech_nacimiento=$request->get('fnaci');
        $persona->edad=$request->get('edad');
        $persona->Estado_id='1';
        $persona->tipo_persona_id=$request->get('tipo_per');
        $persona->save();
        return Redirect::to('partner/clientes');
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
        return view("partner.clientes.show",["persona"=>persona::findOrFail($id)]);
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
        return view("partner.clientes.edit",["persona"=>persona::findOrFail($id)]);
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
        $persona=Persona::findOrFail($id);
        $persona->nombres=$request->get('nombre');
        $persona->ap_paterno=$request->get('ape_pater');
        $persona->ap_materno=$request->get('ape_mater');
        $persona->tipo_documento_id=$request->get('tipo_docu');
        $persona->num_docum=$request->get('num_doc');
        
        $persona->update();
        return Redirect::to('partner/clientes');
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
        $persona=Persona::findOrFail($id);
        $persona->Estado_id='2';
        $persona->update();
        return Redirect::to('partner/clientes');
    
    }
}

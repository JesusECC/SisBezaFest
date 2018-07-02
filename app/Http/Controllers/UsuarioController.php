<?php

namespace SisBezaFest\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SisBezaFest\User;
use SisBezaFest\Http\Requests\UsuarioFromRequest;
use DB;
class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        //
        //filtro de busqueda
        $query=trim($request->get('searchText'));
        //sentencia sql en laravel donde where necesita 3 parametros 
        $usuario=DB::table('users')
        ->where('name','LIKE','%'.$query.'%') 
        ->orderBy('id','asc')
        ->paginate(7);
        return view("administrador.usuario.index",['usuario'=>$usuario,'searchText'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("administrador.usuario.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioFromRequest $request)
    {
        //
        $usuario=new User;
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->rol='cliente';
        $usuario->save();
        return Redirect::to('administrador/usuario');

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
        return view("administrador.uasuario.show",["usuario"=>User::findOrFail($id)]);
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
        return view("administrador.usuario.edit",["usuario"=>User::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioFromRequest $request, $id)
    {
        //
        $usuario=User::findOrFail($id);
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->update();
        return Redirect::to('administrador/usuario');

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
        $usuario=DB::table('users')->where('id','=',$id)->delete();
        return Redirect::to('administrador/usuario');
    }
}

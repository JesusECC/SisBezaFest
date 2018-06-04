<?php

namespace SisBezaFest\Http\Controllers;
use Illuminate\Http\Request;
use SisBezaFest\Evento;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SisBezaFest\Http\Requests\EventoFormRequest;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evento=DB::table('evento as e')
        ->join('estado as es','es.id','=','e.Estado_id')
       // ->where('p.evento_id','!','p.evento_id')
       ->select('e.id','e.nombre','e.fecha','e.direccion','e.imagen','e.descripcion','e.tipo_evento')
        ->orderBy('e.id','asc')
        ->paginate(20);
        return view("home",['evento'=>$evento]);
    }
}

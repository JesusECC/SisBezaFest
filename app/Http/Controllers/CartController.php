<?php

namespace SisBezaFest\Http\Controllers;

use Illuminate\Http\Request;
use SisBezaFest\Paquete;
class CartController extends Controller
{
    //
    public function __cosntruct(){
        if(!\Session::has('cart')) \Session::put('cart',array());
    }

    public function show(){
        $cart= \Session::get('cart');
        if (isset($cart)) {
            $total=$this->total();
        }        
        return  view('main.cart',compact('cart','total'));
    }

    public function add(Paquete $paquete){
        $cart= \Session::get('cart');
        $paquete->cant=1;
        $cart[$paquete->id]=$paquete;
        \Session::put('cart',$cart);
        return  redirect()->route('cart-show');
    }

    public function delete(Paquete $paquete){
        $cart= \Session::get('cart');
        unset($cart[$paquete->id]);
        \Session::put('cart',$cart);
        return  redirect()->route('cart-show');
    }
    public function update($id,$cantid){
        
        $cart= \Session::get('cart');
        $cart[$id]->cant=$cantid;
        \Session::put('cart',$cart);
        return redirect()->route('cart-show');
       //return dd($paquete,$cantid);
    }
    public function trash(){
        \Session::forget('cart');        
        return  redirect()->route('cart-show');
    }
    public function total(){
        $cart= \Session::get('cart');
        $total=0;
        foreach($cart as $t){
            $total+=$t->precio*$t->cant;
        }
        return  $total;
    }
}

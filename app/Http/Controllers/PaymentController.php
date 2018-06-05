<?php

namespace SisBezaFest\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

use SisBezaFest\Pago;
use SisBezaFest\Venta;
use SisBezaFest\DetalleVenta;
use Redirect;
use Session;
use URL;
use DB;
class PaymentController extends Controller
{
    //
    private $_api_context;

    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'],$paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    public function index()
    {
        return view('main.paywithpaypal');
    }
    public function payWithpaypal(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();
        $item_1->setName('Item 1') /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount')); /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');

            //dd($transaction);
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('main/status')) /** Specify return URL **/
            ->setCancelUrl(URL::to('main/status'));


        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
               
         /*dd($payment->create($this->_api_context));//exit; **/
        try {
            //dd($payment); 
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');
                return Redirect::to('/');
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::to('/');
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
        return Redirect::to('main/cart');
    }
    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('error', 'Payment failed');
            return Redirect::to('main/cart');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {
            \Session::put('success', 'Payment success');
            //Session()->forget('cart');
            //Payment {#859 ▼
            //    -_propMap: array:10 [▼
            //      "id" => "PAY-763685428L436832ULMK4XSY"
            //      "intent" => "sale"
            //      "state" => "approved"
            //      "cart" => "6JN07258JF269432E"
            //      "payer" => Payer {#903 ▶}
            //      "transactions" => array:1 [▶]
            //      "redirect_urls" => RedirectUrls {#891 ▶}
            //      "create_time" => "2018-06-04T23:32:57Z"
            //      "update_time" => "2018-06-04T23:32:55Z"
            //      "links" => array:1 [▶]
            //    ]
            //  }
            $id=$result->getId();
           //insert pago
           $idPago=DB::table('pago')->insertGetId(
            ['cod_pago'=>$id,
            'tipo_pago_id'=>3,
            'cliente_id'=>2]
           );
           $hoy = date("F j Y g:i a"); 

           $idventa=DB::table('venta')->insertGetId(
            ['codigo'=>$result->getCart(),
            'fech_venta'=>$hoy,
            'estado'=>'Pagado',
            'comprobante_id'=>1,
            'pago_id'=>$idPago,
            'Estado_id'=>1            
            ]
           ); 
           //tabla venta
           $idventa=DB::table('venta')->insertGetId(
            ['codigo'=>$result->getCart(),
            'fech_venta'=>$hoy,
            'estado'=>'Pagado',
            'comprobante_id'=>1,
            'pago_id'=>$idPago,
            'Estado_id'=>1            
            ]
           ); 
           $cart = \Session::get('cart');
           $total=0;
           foreach($cart as $producto){
			$total += $producto->cant * $producto->precio;
            }
           
           
           //detalle venta y paquete

           $detalle=new DetalleVenta;
           $detalle->total=$total;
           $detalle->descripcion='venta';
           $detalle->cantidad='1';
           $detalle->precio=$total;
           $detalle->paquete_id='1';
           $detalle->venta_id=$idventa;
           $detalle->save();

           //$pago->cod_pago=$id;
           //$pago->tipo_pago_id=3;
           //$pago->cliente_id=2;
           //$pago->save();
           Session()->flush();
            return Redirect::to('main/cart');
        }
        \Session::put('error', 'Payment failed');
        return Redirect::to('main/cart');
    }
    public function savePago($cod_pago,$tipo_pago1,$cliente){
       
    }
}

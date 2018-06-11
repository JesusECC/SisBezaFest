@extends ('layouts.pagina')
@section ('contenido')
     <div class="content-box">
     	<div class="wrap">
     		<ul class="events">
				<li class="active"><a href="main.index">Paquetes</a></li> 
			</ul>
     	   <div class="clear"></div>
     	</div>
     </div>
	 @if ($message = Session::get('success'))
        <div class="w3-panel w3-green w3-display-container">
            <span onclick="this.parentElement.style.display='none'"
    				class="w3-button w3-green w3-large w3-display-topright">&times;</span>
            <p>{!! $message !!}</p>
        </div>
        <?php Session::forget('success');?>
        @endif

        @if ($message = Session::get('error'))
        <div class="w3-panel w3-red w3-display-container">
            <span onclick="this.parentElement.style.display='none'"
    				class="w3-button w3-red w3-large w3-display-topright">&times;</span>
            <p>{!! $message !!}</p>
        </div>
        <?php Session::forget('error');?>
        @endif
        <div class="container">
			<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h1><span><img src="{{asset('images/shopping-cart.svg')}}" alt="" width="50px" height="50px"></span> Carrito de compras</h1>
						@if(isset($cart) && isset($total))
						<div class="table-responsive-center">
							<table class="table table-striped table-bordered table-condensed table-hover">
								<thead>
									<th>Imagen</th>
									<th>Paquete</th>
									<th>Precio</th>
									<th>Cantidad</th>
									<th>Subtotal</th>
									<th>Opciones</th>

								</thead>
								
								
								@foreach ($cart as $c)
								<tr style="text-align: center !important;">
									<td>
										<center>
											<img src="{{asset('images/paquete/'.$c->imagen)}}" alt="{{$c->nombres}}" class="img-responsive" height="50px" width="50px" >
										</center>
									</td>
									<td>{{ $c->nombre }}</td>
									<td>{{ number_format($c->precio,2) }}</td>
									<td>
										<input type="number" min="1" max="{{$c->cantidad}}" value="{{$c->cant}}" id="paquete_{{ $c->id }}" class="solo-numero" style="border-radius: 5px;text-align: center;">
										<a href="#" class="btn  " data-href="{{ route('cart-update',$c->id) }}" data-id="{{ $c->id }}"> <img src="{{asset('images/refresh.svg')}}" alt="" width="20px" height="20px"> </a>
									
									</td>
									<td>{{ number_format($c->precio*$c->cant,2) }}</td>
									<td>
										<a data-target="#modal-vista-{{$c->id}}" href=""  data-toggle="modal" class="btn btn-outline-warning" role="button">
											<span ><img src="{{asset('images/view.svg')}}" alt="" width="30px" height="30px"> </span>
										</a>
										
										<a href="{{route('cart-delete',$c->id)}}" class="btn btn-outline-danger" role="button">
											<span ><img src="{{asset('images/garbage.svg')}}" alt="" width="30px" height="30px"> </span>
										</a>
									</td>

								</tr>
									<div class="modal fade modal-slide-in-right" aria-hidden="true"  role="dialog" tabindex="-1" id="modal-vista-{{$c->id}}">
										<div class="modal-dialog" style="background-color: white">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span  aria-hidden="true">x</span>
												</button>
												<h4 class="modal-title"> Paquete {{$c->nombre}}</h4>
											</div>
											<div class="modal-body">
												<center>
													<img src="{{asset('images/paquete/'.$c->imagen)}}" alt="{{$c->nombrePa}}" class="img-responsive" height="300px" width="500px">
												</center>
												<h3>
													Descripción del evento {{$c->nombreEv}}
												</h3>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">
													Cerrar
												</button>
											</div>
										</div>
									</div>			
								@endforeach
							</table>
							<h3> <span class="label label-success">
									Total: ${{number_format($total,2)}}
								</span></h3>
						</div>
						<a href="{{ route('cart-trash') }}"  class="btn btn-outline-danger" role="button">
							<span>
								<img src="{{asset('images/cart.svg')}}" alt="" width="50px" height="30px">
								Vaciar el carro
							</span>
						</a>
							<a href="" class="btn btn-outline-success" role="button">
								<span>
									<img src="{{asset('images/online-shop.svg')}}" alt="" width="50px" height="30px">
									Seguir Comprando
								</span>
							</a>
							
								<form  method="POST" id="payment-form" action="{!! URL::to('main/paypal') !!}">
									{{ csrf_field() }}
									<input type="hidden"  id="amount" name="amount" value="{{number_format($total,2)}}" >

									<button type="button" class="btn btn-light">
										<span>
											<img src="{{asset('images/paypal.svg')}}" alt="" width="50px" height="50px">
										</span>
										<span>
											Pagar
										</span>
									</button>
								</form>		
										
						@else
							<h3><span class="label label-warning">No hay productos en el carrito :( </span> </h3>
						@endif
						
					</div>
				</div>        	
        </div>

@endsection
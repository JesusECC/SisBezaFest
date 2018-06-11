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
<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h1><i class="fa fa-shopping-cart"></i>Carrito de compras</h1>
			@if(isset($cart) && isset($total))
			<div class="table-responsive-center">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Imagen</th>
						<th>Paquete</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Subtotal</th>
						<th>Quitar</th>

					</thead>
					<tbody>
					
					
					@foreach ($cart as $c)
					<tr>
						<td><img src="{{asset('images/paquete/'.$c->imagen)}}" alt="{{$c->nombres}}" class="img-responsive" height="50px" width="50px"></td>
						<td>{{ $c->nombre }}</td>
						<td>{{ number_format($c->precio,2) }}</td>
						<td>
							<input type="number" min="1" max="{{$c->cantidad}}" value="{{$c->cant}}" id="paquete_{{ $c->id }}" class="solo-numero">
							<a href="#" class="btn btn-warning btn-update-item" data-href="{{ route('cart-update',$c->id) }}" data-id="{{ $c->id }}"> <i class="fa fa-refres">Actualizar</i> </a>
						
						</td>
						<td>{{ number_format($c->precio*$c->cant,2) }}</td>
						<td>
							<a href="{{route('cart-delete',$c->id)}}" class="btn btn-default">
								<i class="fas fa-trash">eliminar</i>
							</a>
						</td>

					</tr>
					@endforeach
					</tbody>
				</table>
				<h3> <span class="label label-success">
						Total: ${{number_format($total,2)}}
					</span></h3>
			</div>
			<a href="{{ route('cart-trash') }}"><button class="btn btn-primary">Vaciar carrito</button></a>
				<a href=""><button class="btn btn-primary">Seguir Comprando</button></a>
				
					<form  method="POST" id="payment-form" action="{!! URL::to('main/paypal') !!}">
						{{ csrf_field() }}
						<input type="hidden"  id="amount" name="amount" value="{{number_format($total,2)}}" >
						<button class="w3-btn w3-blue">Pagar con PayPal</button>
					</form>		
							
			@else
				<h3><span class="label label-warning">No hay productos en el carrito :( </span> </h3>
			@endif
			
		</div>
	</div>
@endsection
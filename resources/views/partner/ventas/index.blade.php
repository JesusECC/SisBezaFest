@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>
				Lista del evento
				<a href="">
					<button class="btn btn-primary">Nuevo</button>
				</a>
			</h3>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th class="hidden-lg">Id</th>
						<th>Evento</th>
						<th>Tipo de Paquete</th>
						<th>Nombre de paquetes</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Número de Personas</th>
						<th>Estado</th>
						<th>Opciones</th>
					</thead>
					@foreach ($paquete as $pq)
					<tr>
						<td class="hidden-lg">{{$pq->id}}</td>
						<td>{{$pq->evento}}</td> 
						<td>{{$pq->tipopaquete}}</td> 
						<td>{{$pq->nombre}}</td>
						<td>{{$pq->precio}}</td> 
						<td>{{$pq->cantidad}}</td> 
						<td>{{$pq->nr_personas}}</td> 
						<td>{{$pq->estado}}</td>
						<td>
							<a href="{{route('paquete.edit', $pq->id)}}"> 
								<button class="btn btn-info">Editar</button></a>

							<a href="" data-target="#modal-delete-{{$pq->id}}" data-toggle="modal">
								<button class="btn btn-danger">Eliminar</button>
							</a>
							<a href="" data-target="#modal-vista-{{$pq->id}}" data-toggle="modal">
								<button class="btn btn-primary">Ver Flyer</button>
							</a>
						</td>
					</tr>
					@include('partner.paquete.modal')
					@include('partner.paquete.modal-imagen')
					@endforeach
					
				</table>
				
			</div>
			<!--para la paginacion-->
			{{$paquete->render()}}
		</div>
	</div>
@endsection
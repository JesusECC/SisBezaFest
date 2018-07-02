@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>
				Listado de Eventos Creados 
				<a href="evento/create">
					<button class="btn btn-primary">Nuevo</button>
				</a>
			</h3>
			@include('partner.evento.search')
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th class="hidden-lg">Id</th>
						<th>Nombre de Evento</th>
						<th>Fecha de Creación</th>
						<th>Fecha de Evento</th>
						<th>Hora de Evento</th>
						<th>Aforo de Evento</th>
						<th>Estado</th>
						<th>Empresa</th>
						<th>Opciones</th>

					</thead>
					@foreach ($evento as $eve)
					<tr>
						<td class="hidden-lg">{{$eve->id}}</td>
						<td>{{$eve->nombre}}</td> 
						<td>{{$eve->fecha_creacion}}</td> 
						<td>{{$eve->fecha}}</td> 
						<td>{{$eve->hora}}</td> 
						<td>{{$eve->aforo}}</td> 
						<td>{{$eve->estado}}</td>
						<td>{{$eve->empresa}}</td>
						<td>
							<a href="{{route('evento.edit', $eve->id)}}"> 
								<button class="btn btn-info">Editar</button></a>

							<a href="" data-target="#modal-delete-{{$eve->id}}" data-toggle="modal">
								<button class="btn btn-danger">Eliminar</button>
							</a>
							<a href="" data-target="#modal-vista-{{$eve->id}}" data-toggle="modal">
								<button class="btn btn-default">Ver Flyer</button>
							</a>
						</td>
					</tr>
					@include('partner.evento.modal')
					@include('partner.evento.modal-imagen')
					@endforeach
					
				</table>
				
			</div>
			<!--para la paginacion-->
			{{$evento->render()}}
		</div>
	</div>
@endsection
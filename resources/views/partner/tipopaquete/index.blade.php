@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>
				Listado de Tipo de Paquetes 
				<a href="tipopaquete/create">
					<button class="btn btn-primary">Nuevo</button>
				</a>
			</h3>
			@include('partner.tipopaquete.search')
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th class="hidden-lg">Id</th>
						<th>Nombre de Tipo Evento</th>
						<th>Opciones</th>
					</thead>
					@foreach ($tipo_paquete as $tp)
					<tr>
						<td class="hidden-lg">{{$tp->id}}</td>
						<td>{{$tp->nom_paquete}}</td> 
						<td>
							<a href="{{route('tipopaquete.edit', $tp->id)}}"> 
								<button class="btn btn-info">Editar</button></a>

							<a href="" data-target="#modal-delete-{{$tp->id}}" data-toggle="modal">
								<button class="btn btn-danger">Eliminar</button>
							</a>
						</td>
					</tr>
					@include('partner.tipopaquete.modal')
					@endforeach
				</table>
				
			</div>
			<!--para la paginacion-->
			{{$tipo_paquete->render()}}
		</div>
	</div>
@endsection
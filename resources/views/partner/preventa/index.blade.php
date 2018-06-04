@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>
				Listado de Preventa Creados 
				<a href="preventa/create">
					<button class="btn btn-primary">Nuevo</button>
				</a>
			</h3>
			@include('partner.preventa.search')
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th class="hidden-lg">Id</th>
						<th>Paquete</th>
						<th>Nombre</th>
						<th>Porcentaje</th>
						<th>Fecha de Inicio</th>
						<th>Fecha de Fin</th>
						<th>Estado</th>
						<th>Opciones</th>
					</thead>
					@foreach ($preventas as $pt)
					<tr>
						<td class="hidden-lg">{{$pt->id}}</td>
						<td>{{$pt->paquete}}</td> 
						<td>{{$pt->nombre}}</td> 
						<td>{{$pt->porcentaje}}</td>
						<td>{{$pt->fecha_inicio}}</td> 
						<td>{{$pt->fecha_fin}}</td>  
						<td>{{$pt->estado}}</td>
						<td>
							<a href="{{route('preventa.edit', $pt->id)}}"> 
								<button class="btn btn-info">Editar</button></a>

							<a href="" data-target="#modal-delete-{{$pt->id}}" data-toggle="modal">
								<button class="btn btn-danger">Eliminar</button>
							</a>
						</td>
					</tr>
					@include('partner.preventa.modal')
					@endforeach
					
				</table>
				
			</div>
			<!--para la paginacion-->
			{{$preventas->render()}}
		</div>
	</div>
@endsection
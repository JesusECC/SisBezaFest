@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>
				Lista de Estados 
				<a href="estado/create">
					<button class="btn btn-primary">Nuevo</button>
				</a>
			</h3>
			@include('administrador.estado.search')
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						
						<th class="hidden-lg" >id</th>
						<th>Nombre</th>
					</thead>
					@foreach ($estado as $per)
					<tr>
						<td class="hidden-lg">{{$per->id}}</td>
						<td>{{$per->nombre}}</td> 
						<td>
							<a href="{{route('estado.edit', $per->id)}}"> 
								<button class="btn btn-info">Editar</button></a>

							<a href="" data-target="#modal-delete-{{$per->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include('administrador.estado.modal')
					@endforeach
				</table>
			</div>
			<!--para la paginacion-->
			{{$estado->render()}}
		</div>
	</div>
@endsection
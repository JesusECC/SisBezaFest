@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>
				Listado de Tipos de Persona
				<a href="tipopersona/create">
					<button class="btn btn-primary">Nuevo</button>
				</a>
			</h3>
			@include('administrador.tipopersona.search')
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th class="hidden-lg">Id</th>
						<th>Tipo Persona</th>
					</thead>
					@foreach ($tipopersona as $td)
					<tr>
						<td class="hidden-lg">{{$td->id}}</td>
						<td>{{$td->tipo_persona}}</td> 
						<td>
							<a href="{{route('tipopersona.edit', $td->id)}}">
								<button class="btn btn-info">Editar</button></a>

							<a href="" data-target="#modal-delete-{{$td->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include('administrador.tipopersona.modal')
					@endforeach
				</table>
			</div>
			<!--para la paginacion-->
			{{$tipopersona->render()}}
		</div>
	</div>
@endsection
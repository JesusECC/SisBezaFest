@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>
				Listado de Tipo de Documento 
				<a href="tipodocumento/create">
					<button class="btn btn-primary">Nuevo</button>
				</a>
			</h3>
			@include('partner.tipodocumento.search')
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Tipo Doc.</th>
						<th>Descripcion</th>
					</thead>
					@foreach ($tipodocumento as $td)
					<tr>
						<td>{{$td->id}}</td>
						<td>{{$td->tipo_doc}}</td> 
						<td>{{$td->descripcion}}</td> 
						<td>
							<a href="{{route('tipodocumento.edit', $td->id)}}">
								<button class="btn btn-info">Editar</button></a>

							<a href="" data-target="#modal-delete-{{$td->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include('partner.tipodocumento.modal')
					@endforeach
				</table>
			</div>
			<!--para la paginacion-->
			{{$tipodocumento->render()}}
		</div>
	</div>
@endsection-->
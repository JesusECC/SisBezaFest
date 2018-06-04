@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>
				Listado de Partner 
				<a href="partner/create">
					<button class="btn btn-primary">Nuevo</button>
				</a>
			</h3>
			@include('administrador.partner.search')
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						
						<th class="hidden-lg" >Numero Documento</th>
						<th>Numero Documento</th>
						<th>Nombres</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>

					</thead>
					@foreach ($persona as $per)
					<tr>
						<td class="hidden-lg">{{$per->id}}</td>
						<td>{{$per->num_docum}}</td> 
						<td>{{$per->nombres}}</td> 
						<td>{{$per->ap_paterno}}</td> 
						<td>{{$per->ap_materno}}</td> 
						<td>
							<a href="{{route('partner.edit', $per->id)}}"> 
								<button class="btn btn-info">Editar</button></a>

							<a href="" data-target="#modal-delete-{{$per->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include('administrador.partner.modal')
					@endforeach
				</table>
			</div>
			<!--para la paginacion-->
			{{$persona->render()}}
		</div>
	</div>
@endsection
@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>
				Lista de Empresas 
				<a href="empresa/create">
					<button class="btn btn-primary">Nuevo</button>
				</a>
			</h3>
			@include('administrador.empresa.search')
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						
						<th class="hidden-lg" >id</th>
						<th>RUC</th>
						<th>RAZON SOCIAL</th>
						<th>NOMBRE EMPRESA</th>
						<th>DIRECCION</th>
						<th>CELULAR</th>
						<th>TELEFONO</th>
						<th>CORREO</th>
						<th>NUMERO CUENTA</th>
					</thead>
					@foreach ($empresa as $per)
					<tr>
						<td class="hidden-lg">{{$per->id}}</td>
						<td>{{$per->ruc}}</td> 
						<td>{{$per->razon_social}}</td>
						<td>{{$per->nombre_empresa}}</td>
						<td>{{$per->direccion}}</td>
						<td>{{$per->celular}}</td>
						<td>{{$per->telefono}}</td>
						<td>{{$per->correo}}</td>
						<td>{{$per->numero_cuenta}}</td>
						<td class="hidden-lg">{{$per->Estado_id}}</td>
						<td class="hidden-lg">{{$per->persona_id}}</td>
						<td>
							<a href="{{route('empresa.edit', $per->id)}}"> 
								<button class="btn btn-info">Editar</button></a>

							<a href="" data-target="#modal-delete-{{$per->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include('administrador.empresa.modal')
					@endforeach
				</table>
			</div>
			<!--para la paginacion-->
			{{$empresa->render()}}
		</div>
	</div>
@endsection
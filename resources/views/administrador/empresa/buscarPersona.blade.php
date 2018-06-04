@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>
				Lista de Partner
				<a href="{{url('administrador/partner')}}"> 
				<button class="btn btn-info">Agregar</button></a>
			</h3>
			
			@include('administrador.empresa.searchPersona')
		</div>
	</div>
	<hr>
    {{Form::token()}}
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						
						<th class="hidden-lg" >id</th>
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
							<a href="{{route('empresa.create','id='.$per->id)}}"> 
								<button class="btn btn-info">Enviar</button></a>

						</td>
					</tr>
					@endforeach
				</table>
			</div>
			<!--para la paginacion-->
			
		</div>
	</div>
    {{Form::Close()}}		
@endsection
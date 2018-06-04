@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="clas-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Clientes: {{$persona->nombres}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>
			{!!Form::model($persona,['method'=>'PATCH','route'=>['clientes.update',$persona->id]])!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" required value="{{$persona->nombres}}" class="form-control">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="ape_pater">Apeliido Paterno</label>
				<input type="text" name="ape_pater" required value="{{$persona->ap_paterno}}" class="form-control" placeholder="Apellido Paterno..">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="ape_mater">Apellido Materno</label>
				<input type="text" name="ape_mater" required value="{{$persona->ap_materno}}" class="form-control" placeholder="Apellido Materno..">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
				<label for="tipo_docu">Tipo Documento</label>
				<select name="tipo_docu" id="tipo_docu" required value="{{old('tipo_docu')}}" class="form-control" >
				<option value="1">DNI</option>
				<option value="2">Pasaporte</option>
				<option value="3">C. Extranjeria</option>
				</select>
			</div>		
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="num_doc">Numero Documento</label>
				<input type="text" name="num_doc" required value="{{$persona->num_docum}}" class="form-control" placeholder="Numero de docuemto..">
			</div>			
		</div>
		
		
		
	</div>
	<div class='row'>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-success" type="submit" >Guardar</button>
				<button class="btn btn-danger"  type="reset" > Cancelar</button>
                <button class="btn btn-primary"  ><a style="text-decoration:none;color:white" href="{{route('clientes.index')}}"> Retornar</a></button>
			</div>			
		</div>
	</div>
	{{Form::Close()}}			
@endsection
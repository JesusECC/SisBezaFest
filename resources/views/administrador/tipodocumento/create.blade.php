@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="clas-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Tipo de Documento</h3>
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
			{!!Form::open(array('url'=>'administrador/tipodocumento','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="nombre.v.">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="ape_pater">Apeliido Paterno</label>
				<input type="text" name="ape_pater" required value="{{old('ape_pater')}}" class="form-control" placeholder="Apellido Paterno..">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="ape_mater">Apellido Materno</label>
				<input type="text" name="ape_mater" required value="{{old('ape_materdoc')}}" class="form-control" placeholder="Apellido Materno..">
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
				<input type="text" name="num_doc" required value="{{old('num_doc')}}" class="form-control" placeholder="Numero de docuemto..">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="cel">Numero Celular</label>
				<input type="text" name="cel" required value="{{old('cel')}}" class="form-control" placeholder="Numero de celular..">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="tele">Numero Telefono</label>				
				<input type="text" name="tele" required value="{{old('tel')}}" class="form-control" placeholder="Numero de telefono..">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="sexo">Sexo</label>
				<select name="sexo" id="sexo" required value="{{old('sexo')}}" class="form-control" >
				<option value="F">Femenino</option>
				<option value="M">Masculino</option>
				</select>
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="dire">Direccion</label>				
				<input type="text" name="dire" required value="{{old('dire')}}" class="form-control" placeholder="Ingrese Direccion..">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="gmail">Correo</label>				
				<input type="gmail" name="gmail" required value="{{old('gmail')}}" class="form-control" placeholder="Ingrese Correo ..">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="fnaci">Fecha Nacimiento</label>				
				<input type="date" name="fnaci" required value="{{old('fnaci')}}" class="form-control" placeholder="Fecha de nacimiento..">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="edad">edad</label>				
				<input type="text" name="edad" required value="{{old('edad')}}" class="form-control" placeholder="edad..">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="estado">Estado</label>
				<select name="estado" id="estado" required value="{{old('estado')}}" class="form-control" >
				<option value="1">Activo</option>
				<option value="2">Inactivo</option>
				</select>
			</div>			
		</div>
		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-success" type="submit">Guardar</button>
				<button class="btn btn-danger"  type="reset">Cancelar</button>
			</div>			
		</div>
	</div>
	{{Form::Close()}}			
@endsection
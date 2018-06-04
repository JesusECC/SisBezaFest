@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="clas-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Registrar Nueva Empresa</h3>
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

	<div class="row">
		<div class="clas-lg-6 col-md-6 col-sm-6 col-xs-12">
			<a  href="buscarPersona">
			<button class="btn btn-primary">Buscar Persona</button></a>
			
		</div>
		
	</div>	
			{!!Form::open(array('url'=>'administrador/empresa','method'=>'POST','autocomplete'=>'on'))!!}
			
			{{Form::token()}}
	<div class="row">
	@isset($_GET['id'])
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="id_per">ID PERSONA</label>
				<input type="text" name="id_per" required value="{{ $_GET['id'] }}" class="form-control"  readonly="readonly">

			</div>			
		</div>
	@endisset
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="ruc">RUC</label>
				<input type="text" name="ruc" required value="{{old('ruc')}}" class="form-control" placeholder="Ruc..">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="razon_social">RAZON SOCIAL</label>
				<input type="text" name="razon_social" required value="{{old('razon_social')}}" class="form-control" placeholder="Nombre..">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nom_empresa">NOMBRE EMPRESA</label>
				<input type="text" name="nom_empresa" required value="{{old('nom_empresa')}}" class="form-control" placeholder="Nombre Empresa..">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="dir">DIRECCION</label>
				<input type="text" name="dir" required value="{{old('dir')}}" class="form-control" placeholder="direccion..">
			</div>			
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="cel">CELULAR</label>
				<input type="text" name="cel" required value="{{old('cel')}}" class="form-control" placeholder="Celular..">
			</div>			
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="tel">TELEFONO</label>
				<input type="text" name="tel" required value="{{old('tel')}}" class="form-control" placeholder="Telefono..">
			</div>			
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="gmail">CORREO</label>
				<input type="text" name="gmail" required value="{{old('gmail')}}" class="form-control" placeholder="Correo..">
			</div>			
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="n_cuenta">NUMERO CUENTA</label>
				<input type="text" name="n_cuenta" required value="{{old('n_cuenta')}}" class="form-control" placeholder="Numero Cuenta..">
			</div>			
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
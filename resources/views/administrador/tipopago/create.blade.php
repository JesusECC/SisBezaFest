@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="clas-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Tipo de Pago</h3>
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
			{!!Form::open(array('url'=>'administrador/tipopago','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="tipopago">Nombre</label>
				<input type="text" name="tipopago" required value="{{old('tipopago')}}" class="form-control" placeholder="nombre..">
			</div>			
		</div>
		
		
		
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<button class="btn btn-success" type="submit">Guardar</button>
			<button class="btn btn-danger"  type="reset" onClick="'self.location.href='administrador/tipopago'" >Cancelar</button>
		</div>			
	</div>
	{{Form::Close()}}			
@endsection
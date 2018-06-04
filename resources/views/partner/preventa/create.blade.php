@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="clas-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Preventa</h3>
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
			{!!Form::open(array('url'=>'partner/preventa','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="paquete">Paquete</label>
				<select name="paquete_id" class="form-control">
					@foreach($paquete as $p)
						<option value="{{$p->id}}">{{$p->nombre}}</option>
					@endforeach
				</select>
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="codigo">Código de Descuento</label>
				<input type="text" name="codigo" required value="{{old('codigo')}}" class="form-control">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="porcentaje">Porcenta</label>
				<input type="number" name="porcentaje" required value="{{old('porcentaje')}}" class="form-control">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="fecha_inicio">Fecha de Inicio</label>
				<input type="date" name="fecha_inicio" required value="{{old('fecha_inicio')}}" class="form-control">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="fecha_fin">Fecha de Fin</label>
				<input type="date" name="fecha_fin" required value="{{old('fecha_fin')}}" class="form-control">
			</div>			
		</div>
	</div>
	<div class='row'>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-success" type="submit" >Guardar</button>
				<button class="btn btn-danger"  type="reset" > Cancelar</button>
                <button class="btn btn-primary"  ><a style="text-decoration:none;color:white" href="{{route('preventa.index')}}"> Retornar</a></button>
			</div>			
		</div>
	</div>
	{{Form::Close()}}			
@endsection
@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="clas-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Paquete</h3>
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
			{!!Form::model($paquete,['method'=>'PATCH','route'=>['paquete.update',$paquete->id],'files'=>'true'])!!}﻿
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" required value="{{$paquete->nombre}}" class="form-control">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="descripcion">Descripción</label>
				<input type="text" name="descripcion" required value="{{$paquete->descripcion}}" class="form-control">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="precio">Precio</label>
				<input type="number" name="precio" required value="{{$paquete->precio}}" class="form-control">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="cantidad">Cantidad</label>
				<input type="number" name="cantidad" required value="{{$paquete->cantidad}}" class="form-control">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nr_personas">Número de personas</label>
				<input type="number" name="nr_personas" required value="{{$paquete->nr_personas}}" class="form-control">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="tipo_paquete">Tipo de Paquete</label>
				<select name="tipo_paquete_id" class="form-control">
					@foreach($tipo_paquete as $tp)
						@if($tp->id == $paquete->tipo_paquete_id)
						<option value="{{$tp->id}}" selected>{{$tp->nom_paquete}}</option>
						@else
						<option value="{{$tp->id}}">{{$tp->nom_paquete}}</option>
						@endif
					@endforeach
				</select>
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="evento_id">Evento</label>
				<select name="evento_id" class="form-control">
					@foreach($evento as $eve)
						@if($eve->id==$paquete->evento_id)
						<option value="{{$eve->id}}" selected>{{$eve->nombre}}</option>
						@else
						<option value="{{$eve->id}}">{{$id->nombre}}</option>
						@endif
					@endforeach
				</select>
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="imagen">Imagen</label>
				<input type="file" name="imagen"  class="form-control">
				@if(($paquete->imagen)!="")
					<img src="{{asset('/imagenes/paquete/'. $paquete->imagen)}}" alt="" height="300px" width="300px">
				@endif				
			</div>				
		</div>
	</div>
	<div class='row'>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-success" type="submit" >Guardar</button>
				<button class="btn btn-danger"  type="reset" > Cancelar</button>
                <button class="btn btn-primary"  ><a style="text-decoration:none;color:white" href="{{route('paquete.index')}}"> Retornar</a></button>
			</div>			
		</div>
	</div>
	{{Form::Close()}}			
@endsection
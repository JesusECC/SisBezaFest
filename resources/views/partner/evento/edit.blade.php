@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="clas-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Evento: </h3>
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
			{!!Form::model($evento,['method'=>'PATCH','route'=>['evento.update',$evento->id],'files'=>'true'])!!}﻿
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" required value="{{$evento->nombre}}" class="form-control">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="fecha">Fecha de Evento</label>
				<input type="date"  data-toggle="tooltip" data-placement="top" title="Ingrese Fecha del Evento" name="fecha" required value="{{$evento->fecha}}" class="form-control">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="hora">Hora del Evento</label>
				<input type="time" name="hora" data-toggle="tooltip" data-placement="top" title="Ingrese la hora del Evento" required value="{{$evento->hora}}" class="form-control">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="aforo">Aforo</label>
				<input type="text" name="aforo" required value="{{$evento->aforo}}" class="form-control">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="descripcion">Descripción</label>
				<input type="text" name="descripcion" required value="{{$evento->descripcion}}" class="form-control">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="tipo_evento">Tipo de Evento</label>
				<input type="text" name="tipo_evento" required value="{{$evento->tipo_evento}}" class="form-control">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="imagen">Imagen</label>
				<input type="file" name="imagen"  class="form-control">
				@if(($evento->imagen)!="")
					<img src="{{asset('/images/eventos/'. $evento->imagen)}}" alt="" height="300px" width="300px">
				@endif
			</div>				
		</div>
	</div>
	<div class='row'>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-success" type="submit" >Guardar</button>
				<button class="btn btn-danger"  type="reset" > Cancelar</button>
                <button class="btn btn-primary"  ><a style="text-decoration:none;color:white" href="{{route('evento.index')}}"> Retornar</a></button>
			</div>			
		</div>
	</div>
	{{Form::Close()}}			
@endsection
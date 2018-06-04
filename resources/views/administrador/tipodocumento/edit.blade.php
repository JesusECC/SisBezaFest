@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="clas-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Tipo de Documento: {{$tipodocumento->tipo_doc}}</h3>
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
			{!!Form::model($tipodocumento,['method'=>'PATCH','route'=>['tipodocumento.update',$tipodocumento->id]])!!}
			{{Form::token()}}
	<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="tipo_doc">Tipo de Documento</label>
				<input type="text" name="tipo_doc" required value="{{$tipodocumento->tipo_doc}}" class="form-control" placeholder="Tipo de Documento..">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="descripcion">Descripcón</label>
				<input type="text" name="descripcion" required value="{{$tipodocumento->descripcion}}" class="form-control" placeholder="Descripción..">
			</div>			
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-success" type="submit">Guardar</button>
				<button class="btn btn-danger"  type="reset">Cancelar</button>
			</div>			
		</div>
	</div>
	{!!Form::close()!!}
@endsection
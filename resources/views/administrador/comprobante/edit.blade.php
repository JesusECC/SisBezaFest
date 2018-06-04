@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="clas-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Comprobante: {{$tipocomprobante->id}}</h3>
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
			{!!Form::model($tipocomprobante,['method'=>'PATCH','route'=>['comprobante.update',$tipocomprobante->id]])!!}
			{{Form::token()}}
	<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="tipo_comprobante">Comprobante</label>
				<input type="text" name="tipo_comprobante" required value="{{$tipocomprobante->tipo_comprobante}}" class="form-control" placeholder="Tipo de Documento..">
			</div>			
		</div>
		

		
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-success" type="submit">Guardar</button>
				<button class="btn btn-danger"  type="reset">Cancelar</button>
			</div>			
		</div>
	{!!Form::close()!!}
@endsection
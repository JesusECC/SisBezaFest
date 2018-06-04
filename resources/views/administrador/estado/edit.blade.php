@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="clas-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Estado: {{$estado->id}}</h3>
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
			{!!Form::model($estado,['method'=>'PATCH','route'=>['estado.update',$estado->id]])!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="estado">Estado</label>
				<input type="text" name="estado" required value="{{$estado->nombre}}" class="form-control">
			</div>			
		</div>
		
		
		
		
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-success" type="submit" >Guardar</button>
				<button class="btn btn-danger"  type="reset" > Cancelar</button>
                <button class="btn btn-primary"  ><a style="text-decoration:none;color:white" href="{{route('usuario.index')}}"> Retornar</a></button>
			</div>			
		</div>
	{{Form::Close()}}			
@endsection
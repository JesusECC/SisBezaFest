@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="clas-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Empresa: {{$empresa->ruc}}</h3>
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
			{!!Form::model($empresa,['method'=>'PATCH','route'=>['empresa.update',$empresa->id]])!!}
			{{Form::token()}}
	<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="ruc">RUC</label>
				<input type="text" name="ruc" required value="{{$empresa->ruc}}" class="form-control" placeholder="Ruc..">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="razon_social">RAZON SOCIAL</label>
				<input type="text" name="razon_social" required value="{{$empresa->razon_social}}" class="form-control" placeholder="Nombre..">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nom_empresa">NOMBRE EMPRESA</label>
				<input type="text" name="nom_empresa" required value="{{$empresa->nombre_empresa}}" class="form-control" placeholder="Nombre Empresa..">
			</div>			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="dir">DIRECCION</label>
				<input type="text" name="dir" required value="{{$empresa->direccion}}" class="form-control" placeholder="direccion..">
			</div>			
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="cel">CELULAR</label>
				<input type="text" name="cel" required value="{{$empresa->celular}}" class="form-control" placeholder="Celular..">
			</div>			
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="tel">TELEFONO</label>
				<input type="text" name="tel" required value="{{$empresa->telefono}}" class="form-control" placeholder="Telefono..">
			</div>			
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="gmail">CORREO</label>
				<input type="text" name="gmail" required value="{{$empresa->correo}}" class="form-control" placeholder="Correo..">
			</div>			
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="n_cuenta">NUMERO CUENTA</label>
				<input type="text" name="n_cuenta" required value="{{$empresa->numero_cuenta}}" class="form-control" placeholder="Numero Cuenta..">
			</div>			
		</div>	
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="id_per">Partne</label>
				<input type="text" name="id_per" required value="{{$empresa->persona_id}}" class="form-control" placeholder="Numero Cuenta.." readonly="readonly">
			</div>			
		</div>	
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="n_cuenta">ESTADO</label>
				
				<select name="estado" id="estado" required >
				@foreach ($estado as $es)
					<option value="{{$es->id}}">{{$es->nombre}}</option>
				@endforeach
				</select>
			</div>			
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
{{  Form::Open(array('action'=>array('EmpresaController@buscarpersona','role'=>'search'),'method'=>'GET'))}}
<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Buscar.." value="{{$searchText}}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-success">Buscar</button>
			
		</span>
	</div>
</div>

{{Form::close()}}

<div>

</div>
				
{!! Form::open(array('url'=>'main','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="textbox">
	<input type="text" name="searchText" placeholder="Buscar tu evento" value="{{$searchText}}"">
			<span class="input-group-btn">
			<button type="submit" class="btn btn-success">Buscar</button>
			</span>
</div>
{{Form::close()}}
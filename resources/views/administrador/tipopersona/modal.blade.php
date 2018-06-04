<div class="modal fade modal-slide-in-right" aria-hidden="true"  role="dialog" tabindex="-1" id="modal-delete-{{$td->id}}">

{{Form::Open(array('action'=>array('TipoPersonaController@destroy',$td->id),'method'=>'DELETE'))}}

	<div class="modal-dialog" style="background-color: white">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span  aria-hidden="true">x</span>
			</button>
			<h4 class="modal-title">Eliminar Tipo Persona {{$td->tipo_persona}}</h4>
		</div>
		<div class="modal-body">
			<p>Confirme si desea Eliminar el tipo de Persona {{$td->tipo_persona}}</p>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">
				Cerrar
			</button>
			<button type="submit" class="btn btn-primary"> Confirmar</button>
		</div>
	</div>
{{Form::Close()}}
</div>
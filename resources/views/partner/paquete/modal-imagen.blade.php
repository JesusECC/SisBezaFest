<div class="modal fade modal-slide-in-right" aria-hidden="true"  role="dialog" tabindex="-1" id="modal-vista-{{$pq->id}}">
	<div class="modal-dialog" style="background-color: white">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span  aria-hidden="true">x</span>
			</button>
			<h4 class="modal-title"> Paquete {{$pq->nombre}}</h4>
		</div>
		<div class="modal-body">
			<center>
				<img src="{{asset('images/paquete/'.$pq->imagen)}}" alt="{{$pq->nombre}}" class="img-responsive" height="300px" width="500px">
			</center>
			
				
					
						<h3>
							Descripción del paquete {{$pq->nombre}}
						</h3>
						<p>
							{{$pq->descripcion}}
						</p>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">
				Cerrar
			</button>
		</div>
	</div>

</div>
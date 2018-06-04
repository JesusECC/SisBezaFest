@extends ('layouts.pagina')
@section ('contenido')
     <div class="content-box">
     	<div class="wrap">
     		<ul class="events">
				<li class="active"><a href="main.index">Eventos Recientes</a></li> 
				
			</ul>
     	   <div class="clear"></div>
     	</div>
     </div>
     <div class="main">
     	@foreach ($evento as $eve)
     	<div class="wrap">
     		<div class="section group">
				<div class="col_1_of_3 span_1_of_3">
					<img src="{{asset('images/eventos/'.$eve->imagen)}}" alt=""/>
					<ul class="m_fb">
						<li>
							<span class="m_22"><a href="#"><img src="{{asset('images/fb.png')}}" alt=""/></a>
							</span>

						    <span class="m_23"><a href="#"><img src="{{asset('images/heart.png')}}" alt=""/></a></span>
						     <div class="clear"></div>
						</li>
					</ul>
					  <div class="desc">
						<h3><a href="#">{{$eve->nombre}}</a></h3>
						<h4 class="m_2">Fecha :{{$eve->fecha}} - Hora: {{$eve->hora}}</h4>
						<h5 class="m_3"><p></p>{{$eve->descripcion}}</p></h5>
					   </div>
					   <div class="section group example">
						<center >
							<div class="get_btn1"><a href="{{url('main/paquete',$eve->id)}}">Ver paquetes</a></div>
						</center>
						
						<div class="clear"></div>
		    		  </div>
				</div>
				<div class="clear"></div>
			</div>

		</div>
		@endforeach
     </div>
     {{$evento->render()}}
@endsection
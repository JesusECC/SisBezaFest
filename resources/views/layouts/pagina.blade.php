<!DOCTYPE HTML>
<html>
<head>
<title>Biza Fest</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />

<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

<link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<link href="{{asset('css/calendar-eightysix-default.css')}}" rel="stylesheet" type="text/css" media="all" />

<link href="{{asset('css/calendar-eightysix-osx-dashboard.css')}}" rel="stylesheet" type="text/css" media="all" />

<link href="{{asset('css/calendar-eightysix-osx-dashboard.css')}}" rel="stylesheet" type="text/css" media="all" />

<script type="text/javascript" src="{{asset('js/mootools-1.2.4-core.js')}}"></script>

<script type="text/javascript" src="{{asset('js/mootools-1.2.4.2-more.js')}}"></script>

<script type="text/javascript" src="{{asset('js/calendar-eightysix-v1.0.1.js')}}"></script>

<script type="text/javascript">
		window.addEvent('domready', function() {
			new CalendarEightysix('exampleI', 	 { 'offsetY': -4 });
			new CalendarEightysix('exampleII', 	 { 'startMonday': true, 'format': '%m.%d.%Y', 'slideTransition': Fx.Transitions.Back.easeOut, 'draggable': true, 'offsetY': -4 });
	});	
</script>

</head>
<body>
  <div class="header-top">
	<div class="wrap">
        <div class="logo">
			<a href="index.html"><img src="{{asset('images/eb2.png')}}" alt=""/></a>
		</div>
		<div class="cssmenu">
		  <nav id="nav" role="navigation">
			<a href="#nav" title="Ver Menu">Ver Menu</a>
			<a href="#" title="Ocultar Menu">Ocultar Menu</a>
			<ul class="clearfix">
				<li class="active">
					<a href="{{url('/')}}">Agendas</a></li>
				<li>
					<a href="start.html"><span>Fotos</span>
					</a>
				</li>
				<li>
					<a href="work.html"><span>Nosotros</span>
					</a>
				</li>
				<li>
					<a href="{{route('cart-show')}}"> 
					<i class="fa fa-shopping-cart"></i>
					<span>@if(isset($cart))
					{{count($cart)>0}}
					@endif</span>
					</a>
				</li>
				<div class="clear"></div>
			</ul>
		    </nav>
		  </div>
		  <div class="buttons">
				<div class="login_btn" style="visibility: hidden;">
					<a href="login.html">Login / Signup</a>
				</div>
				<div class="get_btn">
					<a href="login.html">Login / Salir</a>
				</div>
				
				<div class="clear"></div>
		   </div>
		   </div>
	     <div class="clear"></div>
		<h2 class="head">Encuentra el <span class="m_1">próximo evento, </span>que deseas  <span class="m_1">asistir</span></h2>
     </div>
    </div>
    @yield('contenido')

     <div class="footer">
     	<div class="wrap">
     	  <div class="footer-menu">
     		<ul>
				 
				<li class="active">
					<a href="index.html">Agendas</a></li>
				<li>
					<a href="start.html"><span>Fotos</span>
					</a>
				</li>
				<li>
					<a href="work.html"><span>Nosotros</span>
					</a>
				</li>
				<div class="clear"></div>
			</ul>
     	  </div>
     	  <div class="footer-bottom">
     	  	<div class="copy">
			   <p>Copyright &copy; 2018  <a href="http://jacproyectosweb.com" target="_blank"> Biza Fest</a></p>
		    </div>
		    <div class="social">	
			   <ul>	
				  <li class="facebook"><a href="#"><span> </span></a></li>		
			   </ul>
		    </div>
		    <div class="clear"></div>
     	  </div>
       </div>
     </div>
         <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
	<!-- funcion de js -->
	<script src="{{asset('js/funcion.js')}}"></script>
</body>
</html>

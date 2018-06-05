@extends('layouts.app')

@section('content')
<div class="texto-encabezado text-xs-center">
    <div class="container">
        <div class="row row1">
            <div class="col-md-4">
                <fieldset class="colorOrange">
                    <legend class="withAuto"><img src="{{asset('images/eb2.png')}}" style="border-radius: 50%" width="150px"></legend>
                    <div class="card-header" style="background-color: rgba(0,0,0,0.6);border-radius: 4px;">{{ __('Reiniciar Contraseña') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group row row1">
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Ingrese Correo">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Enviar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>    
</div>

@endsection

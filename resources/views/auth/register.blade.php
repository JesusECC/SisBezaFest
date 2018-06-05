@extends('layouts.app')

@section('content')
<div class="texto-encabezado text-xs-center">
    <div class="container">
        <div class="row row1">
            <div class="col-md-4">
                <fieldset class="colorOrange">
                    <legend class="withAuto"><img src="{{asset('images/eb2.png')}}" style="border-radius: 50%" width="150px"></legend>
                    <div class="card-header" style="background-color: rgba(0,0,0,0.6);border-radius: 4px;">{{ __('Registrar Nuevo Usuario') }}</div>
                    <br>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row row1">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user" aria-hidden="true"></i></span> 
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Ingrese Nombre">

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row row1">
                                <div class="col-md-12">
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
                            </div>
                            <br>
                            <div class="form-group row row1">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Ingrese Contraseña">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row row1">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirmar Contraseña">
                                    </div>
                                </div>
                            </div>
            
                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrar') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </fieldset>
                </div>
            </div>
        </div>
    </div>   
</div> 

@endsection

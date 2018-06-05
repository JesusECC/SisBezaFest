@extends('layouts.app')

@section('content')
<div class="texto-encabezado text-xs-center">
<div class="container">
    <div class="row row1">
        <div class="col-md-4">
            <fieldset class="colorOrange">
                <legend class="withAuto"><img src="{{asset('images/eb2.png')}}" style="border-radius: 50%" width="150px"></legend>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row row1">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>

                                
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} pacity-08" aria-describedby="sizing-addon1" name="email" value="{{ old('email') }}" required autofocus placeholder="Ingrese Correo">

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
                        <div class="form-group row">
                            <div class="col-md-12 ">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar Contraseña<!--{{ __('Remember Me') }}-->
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row ">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-outline-primary">
                                   Ingresar <!--{{ __('Login') }}-->
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Olvide Contraseña<!--{{ __('Forgot Your Password?') }}-->
                                </a>
                            </div>
                        </div>
                    </form>
                
                           
            </fieldset>

        </div>
    </div>
</div>
</div>

@endsection

@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    @yield('css')
@stop

<head>
        <script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/jquery.maskedinput.js') }}" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
        <script src="js/validator.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            $("#cep").mask("99999-999");
            $("#telefone").mask("(99).99999-9999");
        });
        </script>
</head>
@section('body_class', 'register-page')

@section('body')
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">{{ trans('adminlte::adminlte.register_message') }}</p>
            <form class="form-horizontal" method="post" action="/api/usuario" data-toggle="validator">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                           placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                           placeholder="{{ trans('adminlte::adminlte.email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('telefone') ? 'has-error' : '' }}">
                        <input type="telefone" name="telefone" class="form-control" value="{{ old('telefone') }}"
                               placeholder="Telefone">
                        <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                        @if ($errors->has('telefone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telefone') }}</strong>
                            </span>
                        @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('endereco') ? 'has-error' : '' }}">
                        <input type="endereco" name="endereco" class="form-control" value="{{ old('endereco') }}"
                               placeholder="Endereço">
                        <span class="glyphicon glyphicon-globe form-control-feedback"></span>
                        @if ($errors->has('endereco'))
                            <span class="help-block">
                                <strong>{{ $errors->first('endereco') }}</strong>
                            </span>
                        @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('estado') ? 'has-error' : '' }}">
                                {!!Form::select('estadoid', $list_estado, null, ['class'=>'form-control '])!!}
                        <span class="glyphicon glyphicon-globe form-control-feedback"></span>
                        @if ($errors->has('estado'))
                            <span class="help-block">
                                <strong>{{ $errors->first('estado') }}</strong>
                            </span>
                        @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('cidade') ? 'has-error' : '' }}">
                        <input type="cidade" name="cidade" class="form-control" value="{{ old('cidade') }}"
                               placeholder="Cidade">
                        <span class="glyphicon glyphicon-globe form-control-feedback"></span>
                        @if ($errors->has('cidade'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cidade') }}</strong>
                            </span>
                        @endif
                </div>
                
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class="form-control"
                           placeholder="{{ trans('adminlte::adminlte.password') }}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
            <div class="auth-links">
                <a href="/api/home"
                   class="text-center">{{ trans('adminlte::adminlte.i_already_have_a_membership') }}</a>
            </div>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
@stop

@section('adminlte_js')
    @yield('js')
@stop

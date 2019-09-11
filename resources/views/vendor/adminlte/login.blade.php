@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('public/vendor/adminlte/plugins/iCheck/square/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/adminlte/css/auth.css') }}">
    @yield('css')
@stop

@section('body_class', 'login-page')  

@section('body')
    <div class="login-box" >
        <div class="login-logo">
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            @if (session('message'))
                <div class="alert alert-danger">{{ session('message') }}</div>
            @endif  
            <p class="login-box-msg">{{ trans('adminlte::adminlte.login_message') }}</p>
            <form action="{{ url(config('adminlte.login_url', 'login')) }}" method="post">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-xs-12">
                        <a href="login/facebook" class="btn btn-primary btn-block btn-flat">
                            <i class="fa fa-facebook-f"></i> Se connecter avec Facebook
                        </a>  
                    </div>
                </div></br>
                <div class="row">
                    <div class="col-xs-12">
                        <a href="login/google" class="btn btn-danger btn-block btn-flat">
                            <i class="fa fa-google"></i> Se connecter avec Google
                        </a>
                    </div>
                </div></br>
                <!--<div class="row">
                    <div class="col-xs-12">
                        <a href="login/linkedin" class="btn btn-primary btn-block btn-flat">
                            <i class="fa fa-linkedin"></i> Se connecter avec Linkedin
                        </a>
                    </div>
                </div></br>-->
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
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> {{ trans('adminlte::adminlte.remember_me') }}
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit"
                                class="btn btn-primary btn-block btn-flat">{{ trans('adminlte::adminlte.sign_in') }}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            @if (session('confirmation'))
                <div class="alert alert-info" role="alert">
                    {!! session('confirmation') !!}
                </div>
            @endif
            @if ($errors->has('confirmation') > 0 )
                <div class="alert alert-danger" role="alert">
                    {!! $errors->first('confirmation') !!}
                </div>
            @endif
            <div class="auth-links">
                <a href="{{ url(config('adminlte.password_reset_url', 'password/reset')) }}"
                   class="text-center"
                >{{ trans('adminlte::adminlte.i_forgot_my_password') }}</a>
                <br>
                @if (config('adminlte.register_url', 'register'))
                    <a href="{{ url(config('adminlte.register_url', 'register')) }}"
                       class="text-center"
                    >{{ trans('adminlte::adminlte.register_a_new_membership') }}</a>
                @endif
            </div>
        </div>
        <!-- /.login-box-body -->
        <br/>
        <p style="text-align:justify">Les informations que vous communiquez, à l’exception de votre mot de passe qui est crypté et ne peut pas être lu, sont destinées au personnel habilité d’APESA INVEST qui est le responsable de traitement. APESA INVEST collecte vos données pour gérer votre compte utilisateur, permettre l’hébergement et l’administration de collectes de fonds, la gestion marketing et la relation utilisateur et lutter contre la fraude, le blanchiment de capitaux et le financement du terrorisme. Selon les finalités de chaque traitement, vous disposez de certains droits (droit d'opposition, droit d'accès à vos données, droit de rectification et d'effacement de vos données, droit de définir le sort de vos données après votre décès). Pour exercer ces droits, écrire à privacy@apesainvest.com, pour certains droits, vous rendre directement sur votre compte. Pour plus de détails : <a href="#">Politique de Confidentialité d’APESA INVEST.</a></p>
    </div><!-- /.login-box -->
@stop


@section('adminlte_js')
    <script src="{{ asset('public/vendor/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
    @yield('js')
@stop



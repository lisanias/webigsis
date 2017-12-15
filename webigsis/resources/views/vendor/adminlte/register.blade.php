@extends('adminlte::page')

@section('content_header')
    <h1>Usuário</h1>
@stop

@section('content')
<div class="row">
        <div class="col-md-8">

            <div class="box box-alert">

                <div class="register-box-body">
                    <p class="login-box-msg">{{ trans('adminlte::adminlte.register_message') }}</p>
                    <form action="{{ url(config('adminlte.register_url', 'register')) }}" method="post">
                        {!! csrf_field() !!}

                        <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                            <span class="fa fa-user form-control-feedback"></span>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                placeholder="{{ trans('adminlte::adminlte.email') }}">
                            <span class="fa fa-envelope form-control-feedback"></span>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                            <input type="password" name="password" class="form-control"
                                placeholder="{{ trans('adminlte::adminlte.password') }}">
                            <span class="fa fa-lock form-control-feedback"></span>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
                            <span class="fa fa-sign-in form-control-feedback"></span>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button type="submit"
                                class="btn btn-primary"
                        >{{ trans('adminlte::adminlte.register') }}</button>
                    </form>
                    
                </div>
                <!-- /.form-box -->
            </div><!-- /.register-box -->
        </div>
    </div>
@stop



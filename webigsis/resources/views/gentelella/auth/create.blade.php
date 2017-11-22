@extends('gentelella.layouts.app')

@section('content')

    <div class="x_title">
        <h2>
        @if ( isset($user->id) ) Editar Usuário @else Novo usuário @endif
        </h2>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
        
        <br />
        @if ( isset($user) )
            <form method="POST" action="{{ route('user.update', $user->id) }}" id="user-update" data-parsley-validate class="form-horizontal form-label-left">
            {!! method_field('PUT') !!}
        @else
            <form method="POST" action="{{ route('register') }}" id="user-create" data-parsley-validate class="form-horizontal form-label-left">
        @endif
        
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="name" id="name" value="{{$user->name or old('name') }}" class="form-control col-md-7 col-xs-12">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="email" id="email" name="email" value="{{$user->email or old('email') }}" required="required" class="form-control col-md-7 col-xs-12">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

           
           
            @if ( !isset($user->password) ) 
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Senha</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="password" name="password" id="password" class="form-control col-md-7 col-xs-12" required="required">
                     @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
             <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Repetir Senha</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="password" name="password_confirmation" id="password-confirm" class="form-control col-md-7 col-xs-12" required="required">
                </div>
            </div>
            
            @endif

            <div class="ln_solid"></div>
            
            <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
            </div>

        </form>
    </div>

@endsection
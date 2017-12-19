@extends('adminlte::page') 

@section('title_prefix', 'Discipulo | ') 

@section('content_header')
<h1>Discipulo</h1>
@stop 

@section('content')
<div class='row'>
	<div class="col-lg-offset-2 col-lg-8 col-md-offset-1 col-md-10 col-sm-12">
		<div class="box box-info">
			<div class="box-header with-border">

                @if( isset($errors) && count($errors)>0 )
                    <div class="alert alert-danger">
                        <h4><span class="fa  fa-exclamation-triangle"></span> Atenção</h4>
                        <p><strong>Encontramos os seguintes erros no preenchimento do formulário:</strong></p><hr />
                        <ul>
                        @foreach ( $errors->all() as $error )
                            <li>{{$error}}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                
                @yield('title_header')
                
			</div>

            <div class="box-body">
                @yield('content_body')
            </div>
            
            @yield('content_footer')
            
        </div>
    </div>
</div>
@endsection


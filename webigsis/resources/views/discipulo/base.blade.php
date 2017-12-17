@extends('adminlte::page') 

@section('title_prefix', 'Discipulo | ') 

@section('content_header')
<h1>Discipulo</h1>
@stop 

@section('content')
<div class='row'>
	<div class="col-md-8">
		<div class="box box-info">
			<div class="box-header with-border">
                    
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


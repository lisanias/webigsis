@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
         
            @yield('dashboard.menuLateral')

        </div>
        
        <div class="col-md-8 col-md-offset-2">
            
<div class="panel panel-default">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        logado home
    </div>
</div>

        </div>
    </div>
</div>
@endsection

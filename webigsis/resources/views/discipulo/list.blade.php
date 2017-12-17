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
				<h3 class="box-title">Lista de discipulos</h3>
			</div>

            <!-- LISTAGEM -->
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($discipulos as $discipulo)
                        <tr>
                            <th scope="row">{{$discipulo->id}}</th>
                            <td>{{$discipulo->name}}</td>
                            <td>{{$discipulo->email}}</td>
                            <td>
                                <a href="{{ route('discipulo.show', $discipulo->id) }}" class="btn btn-success btn-xs"><span class="fa fa-check"></span></a>
                                <a href="{{ route('discipulo.edit', $discipulo->id) }}" class="btn btn-info btn-xs"><span class="fa fa-edit"></span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- /.box-body -->
            <!-- /LISTAGEM -->

        </div><!-- /.box-info -->
    </div><!-- /.col-md-8 -->
</div><!-- /.row -->
@endsection
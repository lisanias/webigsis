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
				<h3 class="box-title">Lista de discipulos</h3>
			</div>

            <!-- LISTAGEM -->
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class='hidden-xs'>
                            <div class='hidden-xs'>
                                #
                            </div>
                        </th>
                        <th>Nome</th>
                        <th class='hidden-xs hidden-sm'>
                            <div class='hidden-xs hidden-sm'>
                                E-mail
                            </div>
                        </th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($discipulos as $discipulo)
                        <tr>
                            <th scope="row" class='hidden-xs'>
                                <div class='hidden-xs'>
                                    {{$discipulo->id}}
                                </div>
                            </th>
                            <td>{{$discipulo->name}}</td>
                            <td class='hidden-xs hidden-sm'>
                                <div class='hidden-xs hidden-sm'>
                                    {{$discipulo->email}}
                                </div>
                            </td>
                            <td>
                                <div style="display: inline-block;">
                                    <a href="{{ route('discipulo.show', $discipulo->id) }}" class="btn btn-success btn-xs"><span class="fa fa-check"></span></a>
                                    <a href="{{ route('discipulo.edit', $discipulo->id) }}" class="btn btn-info btn-xs"><span class="fa fa-edit"></span></a>
                                    <div class="pull-right hidden-xs">
                                        {!! Form::open(['route' => ['discipulo.destroy', $discipulo->id], 'method' => 'DELETE']) !!}
                                            {!! Form::button("<span class='fa fa-remove'></span>", ['type'=>'input', 'class' => 'btn btn-danger btn-xs', 'title' => 'Atenção, esta ação apaga permanentemente', 'style'=>"margin-left: 3px;"]) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
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
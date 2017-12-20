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
                {!! $discipulos->links() !!}
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
                                <div class="btn-group" data-toggle="btn-toggle" style="display: inline-block;">
                                    <a href="{{ route('discipulo.show', $discipulo->id) }}" class="btn btn-success btn-xs"><span class="fa fa-check"></span></a>
                                    <a href="{{ route('discipulo.edit', $discipulo->id) }}" class="btn btn-info btn-xs"><span class="fa fa-edit"></span></a>
                                    
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $discipulos->links() !!}
            </div><!-- /.box-body -->
            
            <!-- /LISTAGEM -->

        </div><!-- /.box-info -->
    </div><!-- /.col-md-8 -->
</div><!-- /.row -->
@endsection

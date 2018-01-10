@extends('adminlte::page') 

@section('title_prefix', 'Discipulo | ') 

@section('content_header')
<h1>Células</h1>
@stop 

@section('content') 
<div class='row'>
	<div class="col-md-12 col-sm-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Lista de células @if(isset($str)) | Procurar "<i>{{ $str }}</i>" @endif </h3>
			</div>

            <!-- LISTAGEM -->
            <div class="box-body">
                {!! $celulas->links() !!}
                <table class="table table-bordered table-hover vcenter">
                    <thead>
                    <tr>
                        <th class='hidden-xs'>
                                #
                        </th>
                        <th>Lider</th>
                        <th>Celula</th>
                        <th class='hidden-xs hidden-sm'>
                                Endereço
                        </th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($celulas as $celula)
                        <tr>
                            <td scope="row" class='hidden-xs'>
                                    {{$celula->id}}
                            </td>
                            <td>{{ $celula->name }}</td>
                            <td>{{ $celula->lider->name }}</td>
                            <td class='hidden-xs hidden-sm'>
                                    {{ $celula->logradouro }} / {{ $celula->bairro }}
                            </td>
                            <td>
                                <div class="btn-group" data-toggle="btn-toggle" style="display: inline-block;">
                                    <a href="{{ route('celula.show', $celula->id) }}" class="btn btn-default btn-sm"><span class="fa fa-check"></span></a>
                                    <a href="{{ route('celula.edit', $celula->id) }}" class="btn btn-default btn-sm"><span class="fa fa-edit"></span></a>
                                    
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $celulas->links() !!}
            </div><!-- /.box-body -->
            <!-- /LISTAGEM -->

        </div><!-- /.box-info -->
    </div><!-- /.col-md-8 -->
</div><!-- /.row -->
@endsection
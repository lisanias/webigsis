@extends('celula._base')

@section('title_header')
    <div class="box-header with-border">
		<h3 class="box-title"><span class="fa fa-user-circle-o"></span> Informações sobre a célula</h3>
        <div class="pull-right">
            @if($celula->ativo==1)
                <i class='label label-success'>Ativo</i>
            @else
                <i class='label label-danger'>Inativo</i>
            @endif
        </div>
	</div>
@endsection 

@section('content') 
<div class="panel panel-default" style="margin-bottom: 0;">

			<!--  MENU  -->
            <div class="box-header with-border">
                <div class="pull-right">
                    {!! Form::open(['route' => ['celula.destroy', $celula->id], 'method' => 'DELETE']) !!}
                        {!! Form::button("<i class='fa fa-remove'></i><span class='hidden-xs'> Deletar </span>", ['type'=>'input', 'class' => 'btn btn-danger', 'title' => 'Atenção, esta ação apaga permanentemente', 'disabled']) !!}
                    {!! Form::close() !!} 
                </div>
                <a class='btn btn-info' href='{{ url()->previous() }}'> <i class="fa  fa-arrow-circle-o-left"></i><span class='hidden-xs'> Voltar </span></a>
                <a href="{{ route('celula.edit', $celula->id) }}" class="btn btn-primary"><i class="fa fa-edit m-right-xs"> </i><span class='hidden-xs'> Editar </span></a>
                <a href="{{ route('celula.index') }}" class="btn btn-success"><i class="fa fa-fw fa-list-alt m-right-xs"> </i><span class='hidden-xs'> Listar </span></a>
                <a href="{{ route('discipulo.show', $celula->lider_id) }}" class="btn btn-warning"><i class="fa fa-microphone m-right-xs"> </i><span class='hidden-xs'> Líder </span></a>
                @if($celula->anfitriao_id)
                    <a href="{{ route('discipulo.show', $celula->anfitriao_id) }}" class="btn btn-warning"><i class="fa fa-home m-right-xs"> </i><span class='hidden-xs'> Anfitrião </span></a>
                @endif
			</div>

			<!-- /.box-header -->
			<!-- form start -->

            <div class="box-body box-profile">
                
                <h3 class="profile-username text-center">{{$celula->name}}</h3>
                <p class="text-muted text-center">{{$celula->lider->name or 'Lider?'}} / {{$celula->bairro or 'Bairro?'}}</p>
                
            </div>

            <div class="box-body">
                <div class='row'>
                    <div class="col-md-4">
                    	<div class="panel panel-info">
                            <div class="panel-heading">Informações</div>
                            <div class="panel-body">
                                
                                <!--  #####  Informações uteis da celula  #####  -->

                                Horário: @if( $celula->horario ) <strong>{{ Carbon\Carbon::parse($celula->horario)->format('H:i') }} </strong> 
                                @else 'Sem hora definida' @endif
                                <br>
                                Dia da semana: <strong>{{ $celula->diaDaSemana or 'Celual sem dia fixo ou não informado.' }}</strong>
                                <br>
                                Líder: <strong>{{ $celula->lider->name or 'Líder não informado... Insira um lider agora mesmo!' }}</strong>

                            </div><!-- /.panel-body -->
                        </div><!-- /.panel-info -->
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">Endereço:</div>
                            <div class="panel-body">
                                
                                <!--  #####  ENDERECO  #####  -->

                                <address style="margin-bottom: 0;">
                                    @if($celula->logradouro)
                                        {{$celula->logradouro}} 
                                        @if($celula->numero)
                                            , {{$celula->numero}}
                                        @endif
                                        <br>
                                    @endif
                                    @if($celula->bairro)
                                        {{$celula->bairro}}<br>
                                    @endif
                                    @if($celula->cidade)
                                        {{$celula->cidade}}
                                        @if($celula->uf)
                                            - {{$celula->uf}}
                                        @endif
                                        <br>
                                    @endif
                                    @if($celula->cep)
                                        {{$celula->cep}}<br>
                                    @endif
                                </address>
                            </div><!-- /.panel-body -->
                        </div><!-- /.panel-default -->
                    </div>
                    <div class="col-md-4">
                    	<div class="panel panel-info">
                            <div class="panel-heading">Observações</div>
                            <div class="panel-body">
                                
                                <!--  #####  Informações uteis da celula  #####  -->

                                <pre>{{ $celula->obs or 'Sem observações' }}</pre>

                            </div><!-- /.panel-body -->
                        </div><!-- /.panel-info -->
                    </div>
                 </div><!-- /.row -->
            </div><!-- /.div-body -->


            <!-- LISTAGEM -->
            <div class="box-body">

				<div class='row'>
                    <div class="col-md-6">
                    	<div class="panel panel-warning">
                            <div class="panel-heading">Discipulos desta célula</div>
                            


				                <table class="table table-hover vcenter">
				                    <thead>
				                    <tr>
				                        <th class='hidden-xs'>
				                                #
				                        </th>
				                        <th>Discipulo</th>                       
				                        <th>Ação</th>
				                    </tr>
				                    </thead>
				                    <tbody>
				                    @foreach($discipulos as $discipulo)
				                        <tr>
				                            <td scope="row" class='hidden-xs'>
				                                    {{$discipulo->id}}
				                            </td>
				                            <td>{{ $discipulo->name }}</td>
				                            <td>
				                                <div class="btn-group" data-toggle="btn-toggle" style="display: inline-block;">
				                                    <a href="{{ route('discipulo.show', $discipulo->id) }}" class="btn btn-default btn-sm"><span class="fa fa-sign-in"></span></a>
				                                </div>
				                            </td>
				                        </tr>
				                    @endforeach
				                    </tbody>
				                </table>

				            
                        </div><!-- /.panel-default -->
                    </div>
                </div><!-- /.row -->

            </div><!-- /.box-body -->
            
            <!-- /LISTAGEM -->



            <div class='box-footer'>

            </div>
			
</div>
@endsection
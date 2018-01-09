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
                        {!! Form::button("<i class='fa fa-remove'></i><span class='hidden-xs'> Deletar </span>", ['type'=>'input', 'class' => 'btn btn-danger', 'title' => 'Atenção, esta ação apaga permanentemente']) !!}
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
                    <div class="col-md-6">
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
                    <div class="col-md-6">
                    	<div class="panel panel-info">
                            <div class="panel-heading">Informações</div>
                            <div class="panel-body">
                                
                                <!--  #####  ENDERECO  #####  -->

                                Horário
                                <br>
                                Dia da semana

                            </div><!-- /.panel-body -->
                        </div><!-- /.panel-info -->
                    </div>

                 </div><!-- /.row -->
            </div><!-- /.div-body -->
            <div class='box-footer'>

            </div>
			
</div>
@endsection
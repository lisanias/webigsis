@extends('adminlte::page') 

@section('title_prefix', 'Discipulo | ') 

@section('content_header')
<h1>Discipulo</h1>
@stop 

@section('content') 
<div class='row'>
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-group"></i> Ficha de Discipulo</h3>
                <div class="pull-right">
                    @if($discipulo->ativo==1)
                        <i class='label label-success'>Ativo</i>
                    @else
                        <i class='label label-danger'>Inativo</i>
                    @endif
                </div>
			</div>

            <div class="box-header with-border">
                <div class="pull-right">
                    {!! Form::open(['route' => ['discipulo.destroy', $discipulo->id], 'method' => 'DELETE']) !!}
                        {!! Form::button("<i class='fa fa-remove'></i><span class='hidden-xs'> Deletar </span>", ['type'=>'input', 'class' => 'btn btn-danger', 'title' => 'Atenção, esta ação apaga permanentemente']) !!}
                    {!! Form::close() !!} 
                </div>
                <a class='btn btn-info' href='{{ url()->previous() }}'> <i class="fa  fa-arrow-circle-o-left"></i><span class='hidden-xs'> Voltar </span></a>
                <a href="{{ route('discipulo.edit', $discipulo->id) }}" class="btn btn-primary"><i class="fa fa-edit m-right-xs"> </i><span class='hidden-xs'> Editar </span></a>
                <a href="{{ route('discipulo.index') }}" class="btn btn-success"><i class="fa fa-fw fa-list-alt m-right-xs"> </i><span class='hidden-xs'> Listar </span></a>
                @if($discipulo->user_id)
                    <a href="{{ route('user.show', $discipulo->id) }}" class="btn btn-warning"><i class="fa fa-user m-right-xs"> </i><span class='hidden-xs'> Usuário ADM </span></a>
                @endif
			</div>

			<!-- /.box-header -->
			<!-- form start -->

            <div class="box-body box-profile">
                
                <img class="profile-user-img img-responsive img-circle" src="{{ asset('user-images') }}/{{$discipulo->avatar or 'user.png'}}" alt="User profile picture">
                
                <h3 class="profile-username text-center">{{$discipulo->name}}</h3>
                <!-- <p class="text-muted text-center">{{$lider->name or 'Discipulo'}}</p> -->
                
            </div>

            <div class="box-body">
                <div class='row'>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Endereço:</div>
                            <div class="panel-body">
                                
                                <!--  #####  ENDERECO  #####  -->

                                <address style="margin-bottom: 0;">
                                    @if($discipulo->logradouro)
                                        {{$discipulo->logradouro}} 
                                        @if($discipulo->numero)
                                            , {{$discipulo->numero}}
                                        @endif
                                        <br>
                                    @endif
                                    @if($discipulo->bairro)
                                        {{$discipulo->bairro}}<br>
                                    @endif
                                    @if($discipulo->cidade)
                                        {{$discipulo->cidade}}
                                        @if($discipulo->uf)
                                            - {{$discipulo->uf}}
                                        @endif
                                        <br>
                                    @endif
                                    @if($discipulo->cep)
                                        {{$discipulo->cep}}<br>
                                    @endif
                                    E-mail: <strong>{{$discipulo->email or 'Sem e-mail cadastrado!'}}</strong>
                                </address>
                            </div><!-- /.panel-body -->
                        </div><!-- /.panel-default -->
                    
                        <!--  #####  TELEFONES  #####  -->

                        <div class="panel panel-default">
                            <div class="panel-heading">Telefones</div>                        
                            <ul class="list-group">
                            @foreach($telefones as $telefone)
                                <li class="list-group-item">
                                    <i class="fa fa-phone"></i>
                                    {{ $telefone->numero }} 
                                    @if($telefone->tipo)- {{ $telefone->tipo }} @endif
                                    @if($telefone->descricao) ({{ $telefone->descricao }})@endif
                                    <div class='pull-right'>
                                        <a href="{{ route('telefone.edit', $telefone->id) }}" class="btn btn-info btn-xs"><span class="fa fa-edit"></span></a>
                                        <a href="{{ route('telefone.edit', $telefone->id) }}" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
                                        
                                    </div>
                                </li>
                            @endforeach
                            </ul>
                            <div class="panel-footer">
                                <a href="{{ route( 'telefone.create', ['id'=>$discipulo->id] ) }}" class="btn btn-success"><i class="fa fa-plus-square"></i> Adicionar número </a>
                            </div>
                        </div>                        
                    </div>

                    <!--  #####  DADOS PESSOAIS  #####  -->

                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <table class="table">
                                <tr>
                                    <td>
                                        Sexo: 
                                    </td>
                                    <td>
                                        <i class="label label-default"> {{ $discipulo->sexo or '?' }} </i>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        Data de Nascimento:
                                    </td>
                                    <td>
                                        @if( !$discipulo->nascimento_data == null)
                                            {{$discipulo->nascimento_data->format('d/m/Y')}}
                                        @else
                                            <i class="glyphicon glyphicon-question-sign nao" aria-hidden="true"></i> Sem data de nascimento
                                        @endif
                                        
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        Local de Nascimento:
                                    </td>
                                    <td>
                                        {{ $discipulo->nascimento_cidade or '' }} 
                                        @if($discipulo->nascimento_cidade and $discipulo->uf)
                                            -
                                        @endif
                                        {{ $discipulo->nascimento_uf or '' }} 
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        Recebido por:
                                    </td>
                                    <td>
                                        
                                        @if($discipulo->recebidoModo_id==1)
                                            Batismo.
                                        @elseif($discipulo->recebidoModo_id==2)
                                            Tranferência ou jurisdição.
                                        @else
                                            Não foi oficialmente recebido ainda.
                                        @endif
                                        
                                    </td>
                                </tr>
                            </table>
                        </div><!-- /.panel -->
                    
                        <!--  #####  DADOS ECLESIÁSTICOS  #####  -->

                        <ul class="list-group">
                            <li class="list-group-item">        
                                @if($discipulo->e_lider==1)
                                        <i class="glyphicon glyphicon-ok-circle sim" aria-hidden="true"></i>
                                        É lider de celula
                                    @else 
                                        <i class="glyphicon glyphicon-remove-circle nao" aria-hidden="true"></i>
                                        Não lidera celula.
                                @endif
                            </li>
                            
                            <li class="list-group-item">
                                @if($lider)
                                        Discipulado por {{$lider->name}}
                                    @else 
                                        <i class="glyphicon glyphicon-remove-sign nao" aria-hidden="true"></i>
                                        Não tem um discipulador cadastrado.
                                @endif
                            </li>

                            <li class="list-group-item">
                                @if($discipulo->encontro==1)
                                        <i class="glyphicon glyphicon-ok-circle sim" aria-hidden="true"></i> Fez o Encontro com Deus
                                    @elseif($discipulo->encontro===0)
                                        <i class="glyphicon glyphicon-remove-circle nao" aria-hidden="true"></i> Não participou de um Encontro com Deus
                                    @else
                                        <i class="fa fa-question-circle nao" aria-hidden="true"></i> Não informado sobre o Encontro com Deus
                                @endif
                            </li>
                            <li class="list-group-item">
                                @if($discipulo->escolaMinisterios==1)
                                        <i class="glyphicon glyphicon-ok-circle sim" aria-hidden="true"></i> Concluiu a Escola de Ministérios Didake
                                    @elseif($discipulo->escolaMinisterios===0)
                                        <i class="glyphicon glyphicon-remove-circle nao" aria-hidden="true"></i> Não concluiu a Escola de Ministérios Didake
                                    @else
                                        <i class="fa fa-question-circle nao" aria-hidden="true"></i> Não foi informado sobre a Escola de Ministérios Didake
                                @endif
                            </li>
                            <li class="list-group-item">
                                @if($discipulo->batismo==1)
                                        <i class="glyphicon glyphicon-ok-circle sim" aria-hidden="true"></i> É Batizado
                                        @if($discipulo->batismo_data)
                                            - Data do Batismo: {{ $discipulo->batismo_data->format('d/m/Y') }}
                                        @endif
                                        
                                    @elseif($discipulo->batismo===0)
                                        <i class="glyphicon glyphicon-remove-circle nao" aria-hidden="true"></i> Não é batizado
                                    @else
                                        <i class="fa fa-question-circle nao" aria-hidden="true"></i> Não foi informado sobre o batismo
                                @endif
                            </li>
                        </ul>

                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.div-body -->
            <div class='box-footer'>

            </div>
			
		</div>
	</div>
</div>
@endsection
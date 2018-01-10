@extends('celula._base')


@section('title_header')
    <h3 class="box-title"><span class="fa fa-user-circle-o"></span> @if(isset($celula)) Editar @else Adicionar @endif celula</h3>
@endsection 



@section('content_body')

<div class="panel panel-default" style="margin-bottom: 0;">

    <div class="box-body">
        <div class="panel panel-@if(isset($celula)) panel-info @else panel-warning @endif" style="margin-bottom: 0;">
            <div class="panel-heading">
                <h3 class="profile-username text-center "> {{$celula->lider->name or ''}}  {{$celula->name or 'Inserir celula'}} </h3>
            </div>
        </div>
    </div>


    <!-- form start -->
        @if(isset($celula))
            {!! Form::model($celula, ['route' => ['celula.update', $celula->id], 'class'=>'form', 'data-parsley-validate', 'method'=>'put'] ) !!}
        @else	
            {!! Form::open( ['route' => 'celula.store', 'class'=>'form',' data-parsley-validate'] ) !!}
        @endif

				<div class="box-body">

					
                    <div class="form-inline">
                        @if(!isset($celula))
                            <div class="form-group">
                                {!! Form::label('lider_id', 'Lider') !!}
                                <div>
                                    {!! Form::select('lider_id', $lideres, null, ['placeholder'=>'Escolha um lider de celula', 'class'=>'form-control'] ) !!}
                                </div>
                            </div>
                        @endif 

                        <div class="form-group">
    						{!! Form::label('name', 'Nome da célula') !!}
    						<div>
    							{!! Form::text( 'name', null, ['class'=>'form-control', 'placeholder'=>'Nome'] ) !!}
    						</div>
    					</div>
                    </div>

                    <div class="form-inline">
                        <div class="form-group">
                            {!! Form::label('diaDaSemana', 'Dia da Semana') !!}
                            <div>
                                {!! Form::select('diaDaSemana', $diasDaSemana, null, ['placeholder'=>'Escolha um dia', 'class'=>'form-control', 'required' ] ) !!}
                            </div>
                        </div>


    					<div class="form-group">
    						{!! Form::label('horario', 'Horário') !!}
    						<div>
    							{!! Form::time( 'horario', null, ['class'=>'form-control'] ) !!}
    						</div>
    					</div>
                    </div>


					<label>Endereço</label>
					<div class="form-group">
                        <div class='row'>
                            <div class="col-md-9">
                                {!! Form::text('logradouro', null, ['class'=>'form-control', 'placeholder'=>'Rua, Avenida, etc']) !!}


                            </div>
                            
                            <div class="col-md-3">
                                {!! Form::text('numero', null, ['class'=>'form-control', 'placeholder'=>'Número']) !!}
                            </div>
                        </div>
					</div>

                    <div class="form-group">
                        <div class='row'>
                            <div class="col-md-12">
                                {!! Form::text('bairro', null, ['class'=>'form-control', 'placeholder'=>'Bairro']) !!}
                            </div>
                        </div>
					</div>

                    <div class="form-group">
                        <div class='row'>
                            <div class="col-md-6">
                                {!! Form::text('cidade', null, ['class'=>'form-control', 'placeholder'=>'Cidade']) !!}
                            </div>
                            
                            <div class="col-md-3">
                                {!! Form::text('uf', null, ['class'=>'form-control', 'placeholder'=>'UF']) !!}
                            </div>
                            
                            <div class="col-md-3">
                                {!! Form::text('cep', null, ['class'=>'form-control', 'placeholder'=>'CEP']) !!}
                            </div>
                        </div>
					</div>

                    <div class="form-group">
                        <div class="row"><div class="col-md-12">
                            {!! Form::label('obs', 'Observações') !!}
                            <div>
                                {!! Form::textarea( 'obs', null, ['class'=>'form-control', 'placeholder'=>'Observações...'] ) !!}
                            </div>
                        </div></div>
                    </div>

                    
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
                    <button type="reset" class="btn btn-default"><span class="fa fa-refresh"></span><span class='hidden-xs'> Resetar </span></button>
					<a class='btn btn-info' href='{{ url()->previous() }}'> <span class="fa  fa-arrow-circle-o-left"></span><span class='hidden-xs'> Voltar </span></a>
                    @if(isset($discipulo))
                        {!! Form::submit('Salvar', ['class'=>'btn btn-primary btn-acao pull-right']) !!}
                    @else
                        {!! Form::submit('Salvar', ['class'=>'btn btn-primary btn-acao pull-right']) !!}
                    @endif
				</div>
				<!-- /.box-footer -->
		{!! Form::close() !!}
    <!-- / Form ends -->

</div><!-- /.panel-default -->

@endsection

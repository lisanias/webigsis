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
				<h3 class="box-title">Adicionar discipulo</h3>
			</div>

			<!-- /.box-header -->
			<!-- form start -->
			<form class="form" method="POST" action="{{ route('discipulo.store') }}" id="discipulo-store"
			 data-parsley-validate>

				{{ csrf_field() }}

				<div class="box-body">

					<div class='well'>
                        
                        <div class="form-groupo">
                            <label class="checkbox-inline">
                                {!! Form::checkbox('ativo', 1, ['checked'=>true] ) !!} Cadastro ativo. &nbsp
                            </label>
                            <label class="checkbox-inline">
                                {!! Form::checkbox('e_lider', 1 ) !!} É lider de Célula. &nbsp
                            </label>
                        </div>

                        <br />

                        <div class="form-group">
                            <label for="lider_id">Lider</label>
                            <div>
                                <input type="text" class="form-control" name="lider_id" id="lider_id" placeholder="" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="celula_id">Celula</label>
                            <div>
                                <input type="text" class="form-control" name="celula_id" id="celula_id" placeholder="" disabled>
                            </div>
                        </div>

                    </div>
                    
                    <div class="form-group">
						<label for="name">Nome</label>
						<div>
							<input type="text" class="form-control" name="name" id="name" placeholder="Name">
						</div>
					</div>

					<div class="form-group">
						<label for="email">E-mail</label>
						<div>
							<input type="email" class="form-control" name="email" id="email" placeholder="Email">
						</div>
					</div>

					<label>Endereço</label>
					<div class="form-group">
                        <div class='row'>
                            <div class="col-sm-8">
                                {!! Form::text('logradouro', null, ['class'=>'form-control', 'placeholder'=>'Rua, Avenida, etc']) !!}
                            </div>
                            
                            <div class="col-sm-2">
                                {!! Form::text('numero', null, ['class'=>'form-control', 'placeholder'=>'Número']) !!}
                            </div>
                        </div>
					</div>

                    <div class="form-group">
                        <div class='row'>
                            <div class="col-sm-10">
                                {!! Form::text('bairro', null, ['class'=>'form-control', 'placeholder'=>'Bairro']) !!}
                            </div>
                        </div>
					</div>

                    <div class="form-group">
                        <div class='row'>
                            <div class="col-sm-6">
                                {!! Form::text('cidade', null, ['class'=>'form-control', 'placeholder'=>'Cidade']) !!}
                            </div>
                            
                            <div class="col-sm-2">
                                {!! Form::text('uf', null, ['class'=>'form-control', 'placeholder'=>'UF']) !!}
                            </div>
                            
                            <div class="col-sm-2">
                                {!! Form::text('cep', null, ['class'=>'form-control', 'placeholder'=>'CEP']) !!}
                            </div>
                        </div>
					</div>

                    <label>Sexo</label>
                    <div class="form-group">
                        <label class="radio-inline">
                            <input name="sexo" id="sexoM" value="M" type="radio">
                            Sexo Masculino
                        </label>
                        <label class="radio-inline">
                            <input name="sexo" id="sexoF" value="F" type="radio">
                            Sexo Feminino
                        </label>                          
					</div>

                    <div class="form-group">
                        {!! Form::label('nascimento_data', 'Data de Nascimento', ['class'=>'control-label'])!!}
                        <div class='row'>
                            <div class="col-sm-3">
                                {!! Form::date('nascimento_data', null, ['class'=>'form-control', 'placeholder'=>'dd/mm/yyyy']) !!}
                            </div>
                            <div class="col-sm-5">
                                {!! Form::text('nascimento_cidade', null, ['class'=>'form-control', 'placeholder'=>'Cidade']) !!}
                            </div>
                            <div class="col-sm-2">
                                {!! Form::text('nascimento_uf', null, ['class'=>'form-control', 'placeholder'=>'UF']) !!}
                            </div>
                        </div>
					</div>

                    <hr />

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="recebidoModo_id">Recebido modo</label>
                                <div>
                                    {!! Form::select('recebidoModo_id', $recebidoModo, null, ['class'=>'form-control'] ) !!}
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label for="batismo_data">Data de Batismo</label>
                                <div>
                                    {!! Form::date('batismo_data', null, ['class'=>'form-control', 'placeholder'=>'Data em que foi batizado'] ) !!}
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="encontro" id="encontro" value=1> Fez Encontro?
                        </label>
                        <label class="checkbox-inline">
                                <input type="checkbox" name="escolaMinisterios" id="escolaMinisterios" value=1> Fez a Escola de Ministérios?
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" name="batismo" id="batismo" value=1> É Batizado?
                        </label>
                    </div>

                     


				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" class="btn btn-info pull-right">Próximo</button>
				</div>
				<!-- /.box-footer -->
			</form>
		</div>
	</div>
</div>
@endsection

@extends('discipulo._base')


@section('title_header')
    <h3 class="box-title"><span class="fa fa-user-circle-o"></span> @if(isset($discipulo)) Editar @else Adicionar @endif discipulo</h3>
@endsection 



@section('content_body')

<div class="panel panel-default" style="margin-bottom: 0;">

    <div class="box-body">
        <div class="panel panel-@if(isset($discipulo)) panel-info @else panel-warning @endif" style="margin-bottom: 0;">
            <div class="panel-heading">
                <h3 class="profile-username text-center "> {{$discipulo->name or 'Inserir discipulo'}} </h3>
            </div>
        </div>
    </div>


    <!-- form start -->
        @if(isset($discipulo))
            {!! Form::model($discipulo, ['route' => ['discipulo.update', $discipulo->id], 'class'=>'form',' data-parsley-validate', 'method'=>'put'] ) !!}
        @else	
            {!! Form::open( ['route' => 'discipulo.store', 'class'=>'form',' data-parsley-validate'] ) !!}
        @endif

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
                            {!! Form::label('lider_id', 'Lider') !!}
                            <div>
                                {!! Form::select('lider_id', $lideres, null, ['placeholder'=>'Escola um lider de celula', 'class'=>'form-control'] ) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    {!! Form::label('recebidoModo_id', 'Recebido Modo') !!}
                                    <div>
                                        {!! Form::select('recebidoModo_id', $recebidoModo, null, ['class'=>'form-control'] ) !!}
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    {!! Form::label('batismo_data', 'Data de Batismo') !!}
                                    <div>
                                        @if( isset($discipulo) )
                                            {!! Form::date('batismo_data', $discipulo->batismo_data, ['class'=>'form-control data', 'placeholder'=>'Data em que foi batizado'] ) !!}
                                        @else
                                            {!! Form::date('batismo_data', null, ['class'=>'form-control data', 'placeholder'=>'Data em que foi batizado'] ) !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <span class="visible-sm-block visible-md-block visible-lg-block">
                                <div class='checkbox'>
                                    <label class="checkbox-inline">
                                        {!! Form::checkbox('encontro', '1') !!} 
                                        Fez Encontro?
                                    </label>

                                    <label class="checkbox-inline">
                                        {!! Form::checkbox('escolaMinisterios', '1') !!}
                                        Fez a Escola de Ministérios? 
                                    </label>

                                    <label class="checkbox-inline">
                                        {!! Form::checkbox('batismo', '1') !!}
                                        É Batizado?
                                    </label>
                                </div>
                            </span>
                            <span class="visible-xs-block">
                                <div class='checkbox'>
                                    <label class="checkbox">
                                        {!! Form::checkbox('encontro', '1') !!} 
                                        Fez Encontro?
                                    </label>

                                    <label class="checkbox">
                                        {!! Form::checkbox('escolaMinisterios', '1') !!}
                                        Fez a Escola de Ministérios? 
                                    </label>

                                    <label class="checkbox">
                                        {!! Form::checkbox('batismo', '1') !!}
                                        É Batizado?
                                    </label>
                                </div>
                            </span>
                        </div>

                    </div>
                    
                    <div class="form-group">
						{!! Form::label('name', 'Nome') !!}
						<div>
							{!! Form::text( 'name', null, ['class'=>'form-control', 'placeholder'=>'Nome'] ) !!}
						</div>
					</div>

					<div class="form-group">
						{!! Form::label('email', 'E-mail') !!}
						<div>
							{!! Form::text( 'email', null, ['class'=>'form-control', 'placeholder'=>'email@dominio.com'] ) !!}
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
                            {!! Form::radio('sexo', 'M') !!}
                            Sexo Masculino
                        </label>
                        <label class="radio-inline">
                            {!! Form::radio('sexo', 'F') !!}
                            Sexo Feminino
                        </label>                          
					</div>

                    <div class="form-group">
                        {!! Form::label('nascimento_data', 'Data de Nascimento', ['class'=>'control-label'])!!}
                        <div class='row'>
                            <div class="col-sm-3">
                                @if( isset($discipulo) )
                                    {!! Form::date('nascimento_data', $discipulo->nascimento_data, ['class'=>'form-control data', 'placeholder'=>'dd/mm/yyyy'] ) !!}
                                @else
                                    {!! Form::date('nascimento_data', null, ['class'=>'form-control data', 'placeholder'=>'dd/mm/yyyy'] ) !!}
                                @endif
                            </div>
                            <div class="col-sm-5">
                                {!! Form::text('nascimento_cidade', null, ['class'=>'form-control', 'placeholder'=>'Cidade']) !!}
                            </div>
                            <div class="col-sm-2">
                                {!! Form::text('nascimento_uf', null, ['class'=>'form-control', 'placeholder'=>'UF']) !!}
                            </div>
                        </div>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
                    <button type="reset" class="btn btn-default"><span class="fa fa-refresh"></span><span class='hidden-xs'> Resetar </span></button>
					<a class='btn btn-info' href='{{ url()->previous() }}'> <span class="fa  fa-arrow-circle-o-left"></span><span class='hidden-xs'> Voltar </span></a>
                    @if(isset($discipulo))
                        {!! Form::submit('Salvar', ['class'=>'btn btn-primary btn-acao pull-right']) !!}
                    @else
                        {!! Form::submit('Proximo', ['class'=>'btn btn-primary btn-acao pull-right']) !!}
                    @endif
				</div>
				<!-- /.box-footer -->
		{!! Form::close() !!}
    <!-- / Form ends -->

</div><!-- /.panel-default -->
@endsection

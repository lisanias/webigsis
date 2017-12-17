@extends('discipulo.base')

@section('title_header')
Telefones
@endsection        

@section('content_body')
    
    <form class="form" method="POST" action="{{ route('telefone.store') }}" id="discipulo-store" data-parsley-validate>
        {{ csrf_field() }}
        {!! Form::hidden('discipulo_id', $id) !!}
        <div class="form-group">
            <div class='row'>
                <div class="col-sm-4">
                    {!! Form::label('numero', 'Telefone') !!} 
                    {!! Form::text('numero', null, ['id'=>'numero', 'class'=>'form-control', 'placeholder'=>'DDD + Numero', 'data-inputmask'=>"'alias': '(00) 00000-0000'"]) !!}
                    <p class='explicacao'>Numero de telefone e DDD</p>
                </div>
                                
                <div class="col-sm-4">
                    {!! Form::label('tipo', 'Tipo') !!}
                    {!! Form::text('tipo', null, ['class'=>'form-control', 'placeholder'=>'tipo']) !!}
                    <p class='explicacao'>Celular, Fixo, Residencial, Trabalho</p>
                </div>

                <div class="col-sm-4">
                    {!! Form::label('descricao', 'Obs.') !!}
                    {!! Form::text('descricao', null, ['class'=>'form-control', 'placeholder'=>'Obs.']) !!}
                    <p class='explicacao'>Operadora, Watswapp, Contato</p>
                </div>
            </div>
        </div>

        <div class="box-footer">
            <div class='pull-left'>
                {!! Form::label('add_outro', 'Adicionar outro numero?') !!}
                {!! Form::checkbox('add_outro', 'add_outro', false) !!}
            </div>
            <button type="submit" class="btn btn-success pull-right">Salvar</button>
        </div>
    </form>

@endsection    
             
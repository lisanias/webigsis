@extends('discipulo.base')

@section('title_header')
    <h3 class="box-title">Telefones</h3>
@if ( isset($telefone) )
    <div class="pull-right">   
    
        {!! Form::open(['route' => ['telefone.destroy', $telefone->id], 'method' => 'DELETE']) !!}
            {!! Form::submit("Apagar este número", ['class' => 'btn btn-danger btn-xs', 'title' => 'Atenção, esta ação apaga permanentemente']) !!}    
        {!! Form::close() !!}
    
    </div>
@endif
@endsection        

@section('content_body')<!-- box-body -->

    @if( isset($errors) && count($errors)>0 )
        <div class="alert alert-danger">
            @foreach ( $errors->all() as $error )
                <p>{{$error}}</p>
            @endforeach    
        </div>
    @endif
    
<div class="panel panel-default" style="margin-bottom: 0;">

    @if ( isset($telefone) )
        <form class="form" method="POST" action="{{ route('telefone.update', $telefone->id) }}" id="telefone-update" data-parsley-validate>
            {!! method_field('PUT') !!}
            {!! Form::hidden('discipulo_id', $telefone->discipulo_id) !!}
    @else
        <form class="form" method="POST" action="{{ route('telefone.store') }}" id="telefone-store" data-parsley-validate>
            {!! Form::hidden('discipulo_id', $id) !!}
    @endif

        {{ csrf_field() }}

        <div class="panel-body">

        
            <div class="col-sm-4">
                {!! Form::label('numero', 'Telefone') !!} 
                {!! Form::text('numero', (isset($telefone))?$telefone->numero:old('numero'), [
                    'id'=>'numero', 
                    'class'=>'form-control', 
                    'placeholder'=>'DDD + Numero'
                ]) !!}
                <p class='explicacao'>Numero de telefone e DDD</p>
            </div>
                            
            <div class="col-sm-4">
                {!! Form::label('tipo', 'Tipo') !!}
                {!! Form::text('tipo', (isset($telefone))?$telefone->tipo:old('tipo'), ['class'=>'form-control', 'placeholder'=>'tipo']) !!}
                <p class='explicacao'>Celular, Fixo, Residencial, Trabalho</p>
            </div>

            <div class="col-sm-4">
                {!! Form::label('descricao', 'Obs.') !!}
                {!! Form::text('descricao', (isset($telefone))?$telefone->descricao:old('descricao'), ['class'=>'form-control', 'placeholder'=>'Obs.']) !!}
                <p class='explicacao'>Operadora, Watswapp, Contato</p>
            </div>

        </div><!-- ./panel-body  -->

        <div class="panel-footer">
            <button type="reset" class="btn btn-default">Cancelar</button>
            
            <div class='pull-right'>
                @if ( !isset($telefone) )
                    <div class="checkbox pull-left" style="margin-right:10px;">
                      <label>
                        <input name='add_outro' value="add_outro" type="checkbox"> Adicionar mais outro número? 
                      </label>
                    </div>
                @endif
                <button type="submit" class="btn btn-primary" style="margin-left:10px;">Salvar</button>
            </div>
        </div><!-- ./panel-footer  -->


        </form>
    
  </div><!-- panel -->      
@endsection 



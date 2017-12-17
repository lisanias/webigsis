@extends('discipulo.base')

@section('title_header')
Telefones
@endsection        

@section('content_body')

    @if( isset($errors) && count($errors)>0 )
        <div class="alert alert-danger">
            @foreach ( $errors->all() as $error )
                <p>{{$error}}</p>
            @endforeach    
        </div>
    @endif
    
    @if ( isset($telefone) )
        <form method="POST" action="{{ route('telefone.update', $telefone->id) }}" id="telefone-update" data-parsley-validate>
            {!! method_field('PUT') !!}
            {!! Form::hidden('discipulo_id', $telefone->discipulo_id) !!}{{$telefone->discipulo_id}}
    @else
        <form class="form" method="POST" action="{{ route('telefone.store') }}" id="telefone-store" data-parsley-validate>
            {!! Form::hidden('discipulo_id', $id) !!}
    @endif
        {{ csrf_field() }}
        
        <div class="form-group">
            <div class='row'>
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
            </div>
        </div>

        <div class="box-footer">
            @if ( !isset($telefone) )
                <div class='pull-left'>
                    {!! Form::label('add_outro', 'Adicionar outro numero?') !!}
                    {!! Form::checkbox('add_outro', 'add_outro', false) !!}
                </div>
            @endif
            <button type="submit" class="btn btn-primary pull-right col-md-2">Salvar</button>
        </div>
    </form>
    @if ( isset($telefone) )
        <div class="box-footer pull-right">
            {!! Form::open(['route' => ['telefone.destroy', $telefone->id], 'method' => 'DELETE']) !!}
                {!! Form::submit("Apagar este telefone", ['class' => 'btn btn-danger btn-sm', 'title' => 'Atenção, esta ação apaga permanentemente']) !!}    
            {!! Form::close() !!}
        </div>
    @endif

@endsection    
             
@extends('discipulo._base')


@section('title_header')
    <h3 class="box-title"><span class="fa fa-phone"></span> Telefones</h3>
    @if ( isset($telefone) )
        <div class="pull-right">   
        
            {!! Form::open(['route' => ['telefone.destroy', $telefone->id], 'method' => 'DELETE']) !!}
                {!! Form::button("<span class='fa fa-remove'></span> Apagar este número", ['type'=>'input', 'class' => 'btn btn-danger btn-xs', 'title' => 'Atenção, esta ação apaga permanentemente']) !!}    
            
            {!! Form::close() !!} 
        
        </div>
    @endif
@endsection        


@section('content_body')<!-- box-body -->
 
<div class="panel panel-default" style="margin-bottom: 0;">

    @if ( isset($telefone) )
        <form class="form" method="POST" action="{{ route('telefone.update', $telefone->id) }}" id="telefone-update" data-parsley-validate>
            {!! method_field('PUT') !!}
    @else
        <form class="form" method="POST" action="{{ route('telefone.store') }}" id="telefone-store" data-parsley-validate>
    @endif

        {{ csrf_field() }}
        
        {!! Form::hidden('discipulo_id', $id) !!}

            <div class="panel-body">

            
                <div class="col-sm-4">
                    {!! Form::label('numero', 'Telefone') !!} 
                    {!! Form::tel('numero', (isset($telefone))?$telefone->numero:old('numero'), [
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
                
                <button type="reset" class="btn btn-default"><span class="fa fa-refresh"></span><span class='hidden-xs'> Resetar </span></button>
                <a class='btn btn-info' href='{{ url()->previous() }}'> <span class="fa  fa-arrow-circle-o-left"></span><span class='hidden-xs'> Voltar </span></a>
                <a href="{{ route('discipulo.show', $id)}}" class="btn btn-success"><span class="fa fa-user-circle"></span><span class='hidden-xs'> Ver Ficha </span></a>

                <div class='pull-right'>
                    @if ( !isset($telefone) )
                        <div class="checkbox pull-left" style="margin-right:10px;">
                        <label>
                            <input name='add_outro' value="add_outro" type="checkbox"> Adicionar mais outro número? 
                        </label>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary" style="margin-left:10px;"><span class="fa fa-save"></span> Salvar</button>
                </div>
            </div><!-- ./panel-footer  -->
        </form>
    
</div><!-- panel -->      
@endsection 



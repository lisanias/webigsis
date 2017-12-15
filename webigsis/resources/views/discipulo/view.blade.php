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
				<h3 class="box-title">Ficha de Discipulo</h3>
			</div>

			<!-- /.box-header -->
			<!-- form start -->

            <div class="box-body box-profile">
                
                <img class="profile-user-img img-responsive img-circle" src="{{ asset('user-images') }}/{{$discipulo->avatar or 'user.png'}}" alt="User profile picture">
                
                <h3 class="profile-username text-center">{{$discipulo->name}}</h3>
                <p class="text-muted text-center">{{$lider->name or 'Discipulo'}}</p>
                
            </div>

            <div class="box-body">
                <address>
                    <strong>{{$discipulo->name}}</strong><br>
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
                <a href="{{ route("discipulo.edit", $discipulo->id) }}" class="btn btn-primary"><i class="fa fa-edit m-right-xs"> </i> Editar</a>

            </div>
			
		</div>
	</div>
</div>
@endsection
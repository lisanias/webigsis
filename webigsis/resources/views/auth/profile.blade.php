@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Configurar</h1>
@stop


@section('content')
	<div class="row">
        <div class="col-md-8">
            <div class='box box-primary'>
                <div class="box-header with-border">
                    <h3 class="box-title">Perfil</h3>
                    <div class="clearfix"></div>
                </div>


				<div class="box-body">
					<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
						<div class="profile_img">
							<div id="crop-avatar">
							<!-- Current avatar -->
							<img class="img-responsive avatar-view" src="{{ asset('user-images') }}/{{$user->avatar or 'user.png'}}" alt="Avatar" title="">
							</div>
						</div>
						<h3>{{ $user->name }}</h3>
						
						

						<ul class="list-unstyled user_data">
							<li>
								<i class="fa fa-envelope user-profile-icon"></i> 
								{{ $user->email }}
							</li>
						</ul>


						<a href="{{ route("user.edit", $user->id) }}" class="btn btn-primary"><i class="fa fa-edit m-right-xs"></i> Alterar perfil</a>


					</div>

					<div class="col-md-9 col-sm-9 col-xs-12">
						<p class="bg bg-warning">Informações de discipulo aqui!</p>
					</div>
					

				</div>
			</div>
        </div>
    </div>

@endsection
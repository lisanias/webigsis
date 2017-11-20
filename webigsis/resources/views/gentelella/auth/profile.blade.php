@extends('gentelella.layouts.app')

@section('content')

    
    <div class="x_title">
        <h2>Perfil</h2>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">


    	<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
			<div class="profile_img">
				<div id="crop-avatar">
				  <!-- Current avatar -->
				  <img class="img-responsive avatar-view" src="{{ asset('user-images') }}/{{ Auth::user()->avatar }}" alt="Avatar" title="">
				</div>
			</div>
			<h3>{{ Auth::user()->name }}</h3>

			<ul class="list-unstyled user_data">
			<li>
				<i class="fa fa-envelope user-profile-icon"></i> 
				{{ Auth::user()->email }}
			</li>


			<a href="{{ url("user/$autor->id/edit") }}" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i> Alterar perfil</a>
		</div>

      	<div class="col-md-9 col-sm-9 col-xs-12">
			<p class="bg bg-warning">Informações de discipulo aqui!</p>
      	</div>
      	

    </div>

@endsection
@extends('adminlte::page')

@section('content_header')
    <h1>Casa de Oração Para Todos os Povos<small> - Ministério Sagradas Missões</small></h1>
@stop

@section('content')

   	<!-- DESTAQUES INICIAIS -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ count($discipulos->where('ativo', 1)) }}</h3>

              <p>Discipulos ativos</p>
            </div>
            <div class="icon">
              <i class="ion ion ion-person"></i>
            </div>
            <p class="small-box-footer">Total de pessoas cadastradas: {{ count($discipulos) }}</p>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-md-3 col-sm-6 col-xs-6">
          
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">

            	<h3>{{ count($discipulos->where('encontro', 1)) }}</h3>

              <p>Fizeram o Encontro com Deus</p>
            </div>
            <div class="icon">
              <i class="ion ion-ribbon-b"></i>
            </div>
            <p class="small-box-footer">
			{{	number_format( count($discipulos->where('encontro', 1)) / count($discipulos->where('ativo', 1)) * 100 , 0) }}%
            dos discipulos ativos</p>
          </div>
        </div>
        
        <!-- col -->
        <div class="col-md-3 col-sm-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              
              <h3>{{ count($discipulos->where('escolaMinisterios', 1)) }}</h3>

              <p>Cursaram a Escola de Ministérios</p>
            </div>
            <div class="icon">
              <i class="ion ion-university"></i>
            </div>
            <p class="small-box-footer">
			{{	number_format( count($discipulos->where('escolaMinisterios', 1)) / count($discipulos->where('ativo', 1)) * 100 , 0) }}%
            dos discipulos ativos</p>
          </div>
        </div>
        
        <!-- col -->
        <div class="col-md-3 col-sm-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              
              <h3>{{ count($discipulos->where('batismo', 1)) }}</h3>

              <p>Estão Batizados</p>
            </div>
            <div class="icon">
              <i class="ion ion-heart"></i>
            </div>
            <p class="small-box-footer">
			{{	number_format( count($discipulos->where('batismo', 1)) / count($discipulos->where('ativo', 1)) * 100 , 0) }}%
            dos discipulos ativos</p>
          </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- ./DESTAQUES INICIAIS -->

    
	<div class="row">
      	<div class="col-md-6">

            <!-- ANIVERSARIANTES -->
            <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Aniversariantes do mes de {{ ucfirst( strftime( '%B', time() ) ) }}</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">{{$aniversariantes->total()}} aniversariantes</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    
                    @foreach($aniversariantes as $aniversariante)

                    <li>
                      <img class="profile-user-img img-responsive img-circle" src="{{ asset('user-images') }}/{{$aniversariante->avatar or 'user.png'}}" alt="User profile picture">
                      <a class="users-list-name" href="{{ route('discipulo.show', $aniversariante->id) }}">{{$aniversariante->name}}</a>
                      <span class="users-list-date">{{$aniversariante->nascimento_data->day}}</span>
                    </li>

                    @endforeach
                   
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  {!! $aniversariantes->links() !!}
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- ./ ANIVERSARIANTES -->

        </div><!--/.col-md-6 -->
    	
    	<div class="col-md-6">
    		<!-- ADICIONADOS RECENTEMENTE -->
	    	<div class="box box-info">
	            <div class="box-header with-border">
	              <h3 class="box-title">Últimos discipulos adicionados</h3>

	              <div class="box-tools pull-right">
	                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	                </button>
	              </div>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <div class="table-responsive">
	                <table class="table no-margin">
	                  <thead>
	                  <tr>
	                    <th class='hidden-xs'>#</th>
	                    <th>Nome</th>
	                    <th class='hidden-xs'>Situação</th>
	                    <th>Ação</th>
	                  </tr>
	                  </thead>
	                  <tbody>

	                  	
	                  	@foreach($last_discipulos as $discipulo)
		                  <tr>
		                    <td scope="row" class='hidden-xs'>
                                    {{$discipulo->id}}
                            </td>
		                    <td>{{$discipulo->name}}</td>
		                    <td class='hidden-xs'>
		                    	<i class="fa fa-circle-o text-<?= ($discipulo->encontro==1)?'yellow':'gray' ?>"></i>
		                    	<i class="fa fa-circle-o text-<?= ($discipulo->escolaMinisterios==1)?'green':'gray' ?>"></i>
		                    	<i class="fa fa-circle-o text-<?= ($discipulo->batismo==1)?'aqua':'gray' ?>"></i>
		                    </td>
		                    <td>
		                      	<div class="btn-group" data-toggle="btn-toggle" style="display: inline-block;">
                                    <a href="{{ route('discipulo.show', $discipulo->id) }}" class="btn btn-default btn-sm"><span class="fa fa-check"></span></a>
                                    <a href="{{ route('discipulo.edit', $discipulo->id) }}" class="btn btn-default btn-sm"><span class="fa fa-edit"></span></a>                                    
                                </div>
		                    </td>
		                  </tr>
		                 @endforeach
		                 
	                  </tbody>
	                </table>
					
					<ul class="chart-legend inline list-inline hidden-xs clearfix">
	                    <li><i class="fa fa-circle-o text-yellow"></i> Encontro</li>
	                    <li><i class="fa fa-circle-o text-green"></i> Escola de Ministérios</li>
	                    <li><i class="fa fa-circle-o text-aqua"></i> Batismo</li>
                  	</ul>

	              </div>
	              <!-- /.table-responsive -->
	            </div>
	            <!-- /.box-body -->
	            <div class="box-footer clearfix">
	            	
	              <a href="{{ route('discipulo.create') }}" class="btn btn-sm btn-info btn-flat pull-left"><i class="fa fa-plus-square"></i><span class='hidden-xs'> Novo Discipulo</span></a>
	              <a href="{{ route('discipulo.index') }}" class="btn btn-sm btn-default btn-flat pull-right"><i class="fa fa-fw fa-list-alt m-right-xs"> </i><span class='hidden-xs'> Listar todos</span></a>
	            </div>
	            <!-- /.box-footer -->
	        </div>
	    	<!-- ./ADICIONADOS RECENTEMENTE -->

	    </div><!-- /.col-md-6 -->
    </div><!-- /.row -->


@stop
@extends('adminlte::page') @section('title', 'AdminLTE') @section('content_header')
<h1>Discipulo</h1>
@stop @section('content') @if (session('data'))
<div class="alert alert-success">
	{{ session('data') }}
</div>
@else
<div class='row'>
	<div class="col-md-8">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Adicionar discipulo</h3>
			</div>

			<!-- /.box-header -->
			<!-- form start -->
			<form class="form-horizontal form-label-left" method="POST" action="{{ route('discipulo.store') }}" id="discipulo-store"
			 data-parsley-validate>

				{{ csrf_field() }}

				<div class="box-body">

					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Nome</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="name" id="name" placeholder="Name">
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">E-mail</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" name="email" id="email" placeholder="Email">
						</div>
					</div>

					<div class="form-group">
						<label for="sexo" class="col-sm-2 control-label">sexo</label>
						<div class="radio">
							<label>
								<input name="sexo" id="sexo" value="M" checked="" type="radio"> Masculino
							</label>

							<label>
								<input name="sexo" id="sexo" value="F" type="radio"> Feminino
							</label>
						</div>
					</div>

					<div class="form-group">
						<label for="nascimento_data" class="col-sm-2 control-label">Data de Nascimento</label>
						<div class="col-sm-10">
							<input type="date" class="form-control" name="nascimento_data" id="nascimento_data" placeholder="dia/mes/ano">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="encontro" id="encontro"> Fez Encontro?
								</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="escolaMinisterios" id="escolaMinisterios"> Fez a Escola de Ministérios?
								</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="batismo" id="batismo"> É Batizado?
								</label>
							</div>
						</div>
					</div>

				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" class="btn btn-info pull-right">Salvar</button>
				</div>
				<!-- /.box-footer -->
			</form>
		</div>
	</div>
</div>
@endif @endsection
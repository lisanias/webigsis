<li>
	<a href="/home">
		<i class="fa fa-home"></i> 
			Home
	</a>
</li>

<li>
	<a>
		<i class="fa fa-user-circle"></i> 
			Usuários
		<span class="fa fa-chevron-down"></span>
	</a>
	<ul class="nav child_menu">
		<li><a href="{{ route('profile') }}">Perfil</a></li>
		<li><a href="{{ route('user.index') }}">Listar</a></li>
		<li><a href="{{ route('user.create') }}">Register</a></li>
	</ul>
</li>

<li>
	<a>
		<i class="fa fa-users"></i> 
		Discipulos 
		<span class="fa fa-chevron-down"></span>
	</a>
	<ul class="nav child_menu">
		<li><a href="#">Aniversariantes</a></li>
		<li><a href="#">Novo Cadastro</a></li>
	</ul>
</li>

<div class="nav toggle">
    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
</div>

<ul class="nav navbar-nav navbar-right">
    <li>
        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            @if (Auth::user()->avatar)
                <img src="{{ asset('user-images') }}/{{ Auth::user()->avatar}}" alt="">{{ Auth::user()->name }}
            @else
                <img src="{{ asset('user-images') }}/no-user.jpg" alt="">{{ Auth::user()->name }}
            @endif
            <span class=" fa fa-angle-down"></span>
        </a>
        
        <ul class="dropdown-menu dropdown-usermenu pull-right">

            <li>
                <a href="{{ route('profile') }}">
                    <i class="fa fa-user pull-right"></i> 
                    Perfil
                </a>
            </li>

            <li>
                <a href="">
                    <i class="fa fa-cog pull-right"></i>
                    <span>Configurações</span>
                </a>
            </li>

            <li><a href="{{ route('help') }}">Ajuda</a></li>

            <li>
                <a href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out pull-right"></i> 
                    Sair
                </a>
            </li>

        </ul>
    </li>
    

</ul>


                
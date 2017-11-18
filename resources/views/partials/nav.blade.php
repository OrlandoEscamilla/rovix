<nav class="navbar navbar-carbon navbar-fixed-top" id="sectionsNav">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">ROVIX</a>
        </div>

        <div class="collapse navbar-collapse" id="navigation-example">
            <ul class="nav navbar-nav navbar-right">
                {{--@if(!session('usuario_id') == '')
                    <li>
                        <a href="{{url('/perfil')}}">
                            PERFIL
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/resource')}}">
                            RECURSOS
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/logout')}}">
                            SALIR
                        </a>
                    </li>
                @endif--}}
                @if(Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuario <b
                                    class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/perfil">Mi perfil</a></li>
                            <li><a href="{{url('/resource')}}">Mis recursos</a></li>
                            <li class="divider"></li>
                            <li><a href="{{url('/logout')}}">Salir</a></li>
                        </ul>
                    </li>
                @endif
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Recursos <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/buscar">Buscador</a></li>
                        <li><a href="#"><i class="fa fa-cog fa-spin"></i> Guías</a></li>
                        <li><a href="#"><i class="fa fa-cog fa-spin"></i> Plataformas de aprendizaje</a></li>
                        {{--<li class="divider"></li>--}}
                    </ul>
                </li>
                <li>
                    <a href="{{url('/about')}}">
                        acerca
                    </a>

                </li>
            </ul>
        </div>
    </div>
</nav>
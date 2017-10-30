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
                @if(!session('usuario_id') == '')
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
                @endif
                <li>
                    <a href="{{url('/about')}}">
                        ABOUT
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
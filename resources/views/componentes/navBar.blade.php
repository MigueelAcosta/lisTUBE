<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Barra de navegacion</span>

            </button>
            <a class="navbar-brand" href="/">lisTUBE</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
            </ul>
            <form class="navbar-form navbar-right" method="GET" action="/busqueda" >
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Buscar" name="nombre">
                </div>
                <button type="submit" class="btn btn-default">Buscar</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    @if(Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="../misVideos">Mis videos</a>
                            </li>
                            @if(Auth::user()->rol=='admin')
                                <li>
                                    <a href="/registroLote">Registro usuarios</a>
                                </li>
                            @endif

                            <li>
                                <a href={{route('video.create')}}>Subir video</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Cerrar sesión
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>

                    @else
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Iniciar sesión <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('login') }}">Iniciar sesión</a></li>
                            <li><a href="{{ route('register') }}">Registro</a></li>
                        </ul>
                    @endif
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
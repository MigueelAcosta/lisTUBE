<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">lisTUBE</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
            </ul>
            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Buscar</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">nombre <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <div class="container-login">
                            <div class="row">
                                <div class="col-md-offset-1 col-md-10">
                                    <div class="form-login">
                                        <h4>Iniciar sesion</h4>
                                        <input type="text" id="userName" class="form-control input-sm chat-input" placeholder="username" />
                                        </br>
                                        <input type="text" id="userPassword" class="form-control input-sm chat-input" placeholder="password" />
                                        </br>
                                        <div class="wrapper">
                                        <span class="group-btn">
                                            <a href="#" class="btn btn-primary btn-md">Iniciar sesion </a>
                                            <a href="{{asset('register')}}" class="btn btn-link">Registro</a>
                                        </span>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
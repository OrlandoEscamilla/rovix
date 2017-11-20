@extends('layouts.master')

@section('content')

    <div class="cd-section" id="headers">

        <div class="header-2">

            <div class="page-header header-filter" style="background-image: url('/img/examples/card-project5.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center">
                            <h1 class="title"> Bienvenido a Rovix!</h1>
                            <h4>Busca recursos para la tecnología que te interesa aprender:</h4>
                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="card card-form-horizontal">
                                <div class="content">
                                    {!! Form::open(['method' => 'GET', 'url' => '/search']) !!}
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" class="form-control text-center" name="searching"
                                                       style="font-weight: bold; text-transform: uppercase;"
                                                       autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="submit" class="btn btn-rose btn-block" value="Buscar"/>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="cd-section" id="features">

        <div class="container">

            <!--     *********     FEATURES 1      *********      -->

            <div class="features-1">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="title">Estos son los tipos de recursos que encontrarás:</h2>
                        {{--<h5 class="description">This is the paragraph where you can write more details about your
                            product. Keep you user engaged by providing meaningful information. Remember that by this
                            time, the
                            user is curious, otherwise he wouldn't scroll to get here. Add a button if you want the user
                            to
                            see more.
                        </h5>--}}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-default">
                                <i class="material-icons">book</i>
                            </div>
                            <h4 class="info-title">Libros</h4>
                            {{--<p>Divide details about your product or agency work into parts. Write a few lines about each
                                one. A paragraph describing a feature will be enough.</p>--}}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-danger">
                                {{--<i class="material-icons">verified_user</i>--}}
                                <i class="fa fa-youtube"></i>
                            </div>
                            <h4 class="info-title">Canales</h4>
                            {{--<p>Divide details about your product or agency work into parts. Write a few lines about each
                                one. A paragraph describing a feature will be enough.</p>--}}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-rose">
                                <i class="material-icons">desktop_mac</i>
                            </div>
                            <h4 class="info-title">Cursos en linea</h4>
                            {{--<p>Divide details about your product or agency work into parts. Write a few lines about each
                                one. A paragraph describing a feature will be enough.</p>--}}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">rss_feed</i>
                            </div>
                            <h4 class="info-title">Guías y Blogs</h4>
                            {{--<p>Divide details about your product or agency work into parts. Write a few lines about each
                                one. A paragraph describing a feature will be enough.</p>--}}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-primary">
                                {{--<i class="material-icons">verified_user</i>--}}
                                <i class="fa fa-git"></i>
                            </div>
                            <h4 class="info-title">Repositorios</h4>
                            {{--<p>Divide details about your product or agency work into parts. Write a few lines about each
                                one. A paragraph describing a feature will be enough.</p>--}}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-warning">
                                <i class="fa fa-podcast"></i>
                            </div>
                            <h4 class="info-title">Podcasts</h4>
                            {{--<p>Divide details about your product or agency work into parts. Write a few lines about each--}}
                            {{--one. A paragraph describing a feature will be enough.</p>--}}
                        </div>
                    </div>
                </div>

            </div>

            <!--     *********    END FEATURES 1      *********      -->

        </div>

    </div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                @if(!session('usuario_id', ''))
                    <h1>¿Interesado en participar y compartir?</h1>
                    <a href="{{url( session('usuario_id', '') != '' ? '#' : '/login/github')}}"
                       class="btn btn-github btn-lg">
                        Entrar con Github
                        <i class="fa fa-github"></i>
                    </a>
                @else
                    <h1>¡Empieza a compartir tu conocimiento con la comunidad!</h1>
                    <br>
                    <a href="{{url('/resource')}}" class="btn btn-github btn-lg">
                        Agregar recurso
                        <i class="fa fa-cubes"></i>
                    </a>
                @endif
            </div>
        </div>
    </div>

@stop
@extends('layouts.master')

@section('content')

    <div class="cd-section" id="headers">

        <div class="header-1">

            <div class="page-header header-filter" style="background-image: url('/img/bg12.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-10 col-xs-offset-1">
                            <h1 class="title text-center">Plataformas de aprendizaje</h1>
                            <h4 class="text-center">
                                La mejor forma de aprender es viendo y haciendo, en el siguiente listado puede encontrar
                                algunas de las mejores plataformas para aprender a programar, encuentra tu camino para
                                ser mejor constantemente!</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="section-space"></div>

    @foreach($platforms as $chunk)
        <div class="row">
            @foreach($chunk as $platform)
                <div class="col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-0">
                    <div class="tarjeta">
                        <div class="tarjeta-imagen">
                            <a href="#">
                                <img src="/img/platforms/{{$platform['image']}}" class="img-responsive">
                            </a>
                        </div>
                        <h4 class="tarjeta-titulo">
                            <a href="#">{{$platform['name']}}</a>
                        </h4>
                        <div class="tarjeta-contenido">
                            <p class="tarjeta-contenido_descripcion">{{$platform['short_description']}}</p>
                        </div>
                        <div class="tarjeta-footer">
                            <a href="#" class="btn btn-sm btn-rose">Ver más</a>
                        </div>
                    </div>
                </div>
            @endforeach
            @if($loop->last)
                <div class="col-md-4">
                    <div class="card">
                        <div class="content content-rose">
                            <h5 class="category-social">
                                <i class="fa fa-twitter"></i> Twitter
                            </h5>
                            <h4 class="card-title">
                                <a href="#">¿Te interesa sugerir alguna plataforma?</a>
                            </h4>
                            <a href="#" class="btn btn-github">Llenar formulario</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @endforeach
@endsection


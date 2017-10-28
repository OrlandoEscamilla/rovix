@extends('layouts.master')

@section('content')
    <div class="section-space"></div>

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="#pablo">
                            <img class="img" src="/img/yomero.jpg"/>
                        </a>
                    </div>

                    <div class="content">
                        <h4 class="card-title">Hiram Guerrero</h4>
                        <h6 class="category text-muted">Desarrollador</h6>

                        <p class="card-description">
                            Todos los comienzos son difíciles.
                        </p>
                        <div class="footer">
                            <a href="#pablo" class="btn btn-just-icon btn-simple btn-github">
                                <i class="fa fa-github"></i>
                            </a>
                            <a href="#pablo" class="btn btn-just-icon btn-simple btn-dribbble">
                                <i class="fa fa-dribbble"></i>
                            </a>
                            <a href="#pablo" class="btn btn-just-icon btn-simple btn-google">
                                <i class="fa fa-globe"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="content content-info">
                        <h3 class="category-social">
                            <i class="fa fa-info-circle"></i> Aportaciones
                        </h3>
                        <p class="card-title">
                            Has realizado 10 aportaciones al portal
                        </p>
                        <p class="card-title">
                            Eres un miembro activo desde hace 10 meses
                        </p>
                        <p class="card-title">
                            Has dado <i class="fa fa-star"></i> a 10 artículos
                        </p>
                        <div class="footer text-center">
                            <a href="#pablo" class="btn btn-google btn-round">Darme de baja</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop
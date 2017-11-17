@extends('layouts.master')

@section('content')
    <div class="section-space"></div>

    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="card">
                <div class="content">
                    <h4 class="card-title">Editar recurso</h4>
                    <br>
                    @include('resources.form', ['recurso' => $recurso, 'url' => $url, 'method' => $method])
                </div>
            </div>
        </div>
    </div>
@stop
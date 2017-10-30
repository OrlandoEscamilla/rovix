@extends('layouts.master')

@section('content')
    <div class="row">

        <style>
            table {
                overflow-x: auto;
            }
        </style>

        @include('partials.flash-message')

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <!-- Tabs with icons on Card -->
                <div class="card card-nav-tabs">
                    <div class="header header-rose">
                        <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#resources" data-toggle="tab">
                                            {{--<i class="material-icons">face</i>--}}
                                            Mis recursos
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#new" data-toggle="tab">
                                            {{--<i class="material-icons">chat</i>--}}
                                            Nuevo recurso
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="tab-content">
                            <div class="tab-pane active" id="resources">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Nombre</th>
                                        <th>Enlace</th>
                                        <th>Lenguaje</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($resources as $resource)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$resource->name}}</td>
                                            <td><a href="{{$resource->link}}" target="_blank">{{$resource->link}}</a></td>
                                            <td>{{$resource->language->name}}</td>
                                            <td class="td-actions">
                                                <a href="{{url("/resource/$resource->id/edit")}}" class="btn btn-success btn-simple">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a href="#" class="btn btn-danger btn-simple">
                                                    <i class="material-icons">close</i>
                                                </a>
                                                {!! Form::open(['url' => "/resource/$resource->id", 'method' => 'DELETE', 'class' => 'inline-block actions']) !!}
                                                {{Form::submit('Eliminar', ['class' => 'btn btn-sm btn-danger', 'style' => 'display: none'])}}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td>Alex Mike</td>
                                        <td>Design</td>
                                        <td>2010</td>
                                        <td class="td-actions">
                                            <button type="button" rel="tooltip" class="btn btn-success btn-simple">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button type="button" rel="tooltip" class="btn btn-danger btn-simple">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="new">
                                @if(!isset($recurso))
                                    @include('resources.form', ['url' => $url, 'method' => $method])
                                @else
                                    @include('resources.form', ['recurso' => $recurso, 'url' => $url, 'method' => $method])
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Tabs with icons on Card -->
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script>

        $('.btn-eliminar').click(function () {
            $(this).siblings('.actions').find('input[type=submit]').click();
        });


        $('#new-resource').click(function () {
            $(this).parent().addClass('active').siblings().removeClass('active');
            $('#form-resources').show().siblings().hide();
        });

        $('#my-resources').click(function () {
            $(this).parent().addClass('active').siblings().removeClass('active');
            $('#table-resources').show().siblings().hide();
        });

    </script>
@endsection
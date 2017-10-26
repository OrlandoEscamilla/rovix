@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>
                <small></small>
            </h3>
            <ul class="nav nav-pills nav-pills-danger text-center">
                <li class="active"><a href="#pill1" data-toggle="tab">Mis recursos</a></li>
                <li><a href="#pill2" data-toggle="tab">Nuevo</a></li>
            </ul>
            <div class="tab-content tab-space">
                <div class="tab-pane active" id="pill1">
                    <table class="table">
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
                <div class="tab-pane" id="pill2">
                    {!! Form::open(['method' => 'post']) !!}

                    <div class="form-group">
                        {!! Form::label('title', 'Nombre del recurso:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label>Tipo:</label>
                        <select class="select form-control">
                            <option value="1">Libros</option>
                            <option value="2">Canal Youtube</option>
                            <option value="2">Podcast</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="togglebutton">
                            <label>
                                <input type="checkbox" checked="">
                                Es un recurso de pago
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Lenguaje: </label>
                        <select class="select form-control">
                            <option value="1">Java</option>
                            <option value="2">Python</option>
                            <option value="2">PHP</option>
                        </select>
                    </div>
                    <div class="form-group">
                        {!! Form::label('title', 'Enlace:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('title', 'Nombre del recurso:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label>Descripción:</label>
                        <textarea class="form-control" rows="5"></textarea>
                    </div>
                    <div class="form-group text-center">
                        {!! Form::submit('Guardar recurso', ['class'=>'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop
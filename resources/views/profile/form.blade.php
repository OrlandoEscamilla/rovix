@extends('layouts.master')

@section('content')
    <div class="section-space"></div>

    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="content">
                    <h4 class="card-title">
                        <a href="#">Actualizar mi perfil</a>
                    </h4>
                    {!! Form::open(['url' => '/perfil/actualizar/'.$user->id, 'method' => 'post']) !!}

                    <div class="col-sm-12 text-center">
                        <div class="form-group">
                            <h4>
                                <small>Avatar</small>
                            </h4>
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail img-raised"
                                     style="max-width: 400px; max-height: 250px;">
                                    <img src="/img/image_placeholder.jpg" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail img-raised"
                                     style="max-width: 400px; max-height: 250px;"></div>
                                <div>
                                <span class="btn btn-round btn-rose btn-file">
                                    <span class="fileinput-new">Elegir imagen</span>
                                    <span class="fileinput-exists">Cambiar</span>
                                    <input type="file" name="avatar" accept="image/*">
                                </span>
                                    <a href="#" class="btn btn-danger btn-simple btn-round fileinput-exists"
                                       data-dismiss="fileinput">
                                        <i class="fa fa-times"></i>
                                        Eliminar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-sm-6">
                        <label class="control-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre">
                    </div>

                    <div class="form-group col-sm-6">
                        <label class="control-label">Titulo</label>
                        <input type="text" class="form-control" name="titulo"
                               placeholder="p.e. Evangelista Android">
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="control-label">Bio</label>
                        <input type="text" class="form-control" name="bio"
                               placeholder="p.e. Cuando no tiro líneas en el trabajo, las tiro en la casa...">
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="control-label">Website</label>
                        <input type="text" class="form-control" name="website">
                    </div>
                    <div class="form-group col-sm-12 text-center">
                        <input type="submit" class="btn btn-success" value="guardar">
                    </div>

                </div>

                {!! Form::close() !!}
                {{--<div class="footer">
                    <div class="author">
                        <a href="#pablo">
                            <img src="assets/img/faces/christian.jpg" alt="..." class="avatar img-raised">
                            <span>Lord Alex</span>
                        </a>
                    </div>
                    <div class="stats">
                        <i class="material-icons">favorite</i> 342 &middot;
                        <i class="material-icons">chat_bubble</i> 45
                    </div>
                </div>--}}
            </div>
        </div>
    </div>
@endsection
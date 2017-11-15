@extends('layouts.master')

@section('content')
    <div class="section-space"></div>

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="#pablo">
                            <img src="{{\App\User::find($user->id)->githubUser->avatar ?? 'http://i.pravatar.cc/150?img=3'}}"
                                 alt="avatar" class="img">
                        </a>
                    </div>

                    <div class="content">
                        <h4 class="card-title">{{$user->name}}</h4>
                        <h6 class="category text-muted">Desarrollador</h6>

                        <p class="card-description">
                            {{$user->githubUser->bio}}
                        </p>
                        <div class="footer">
                            @if($user->githubUser->profile_url)
                                <a href="{{$user->githubUser->profile_url}}"
                                   class="btn btn-just-icon btn-simple btn-github" target="_blank">
                                    <i class="fa fa-github"></i>
                                </a>
                            @endif
                            <a href="#pablo" class="btn btn-just-icon btn-simple btn-dribbble">
                                <i class="fa fa-dribbble"></i>
                            </a>
                            <a href="#pablo" class="btn btn-just-icon btn-simple btn-google">
                                <i class="fa fa-globe"></i>
                            </a>
                            <a href="/perfil/actualizar/{{$user->id}}" class="btn btn-success btn-simple btn-round pull-right">
                                <i class="fa fa-pencil"></i> Editar
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
                            Has realizado {{count(\App\User::find($user->id)->resources)}} aportaciones al portal
                        </p>
                        <p class="card-title">
                            Eres un miembro activo desde
                            hace {{Carbon\Carbon::parse($user->created_at)->diffForHumans()}}
                        </p>
                        <p class="card-title">
                            Has dado <i class="fa fa-star"></i> a {{count(\App\User::find($user->id)->getStars)}}
                        </p>
                        <div class="footer text-center">
                            <a href="#pablo" class="btn btn-google btn-round">Darme de baja</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="material-icons">clear</i>
                            </button>
                            <h4 class="modal-title">Editar mi perfil</h4>
                        </div>
                        <div class="modal-body">
                            {!!Form::open()!!}
                            <div class="form-group label-floating">
                                <label class="control-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Titulo</label>
                                <input type="text" class="form-control" name="titulo"
                                       placeholder="p.e. Evangelista Android">
                            </div>
                            <div class="form-group">
                                <label>Bio:</label>
                                <input type="text" class="form-control" name="bio"
                                       placeholder="p.e. Cuando no tiro líneas en el trabajo, las tiro en la casa...">
                            </div>
                            <div class="form-group">
                                <label>Website</label>
                                <input type="text" class="form-control" name="website">
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success">Guardar</button>
                        {{--<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

@stop
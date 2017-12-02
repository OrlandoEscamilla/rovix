@extends('layouts.master')

@section('content')
    <div class="section-space"></div>

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="#">
                            {{--<img src="{{\App\User::find($user->id)->githubUser->avatar ?? 'http://i.pravatar.cc/150?img=3'}}"
                                 alt="avatar" class="img">--}}
                            <img src="{{($user->avatar) ? '/img/'.$user->avatar : \App\User::find($user->id)->githubUser->avatar}}"
                                 alt="avatar" class="img">
                        </a>
                    </div>

                    <div class="content">
                        <h4 class="card-title">{{$user->name}}</h4>
                        <h6 class="category text-muted">{{$user->title}}</h6>

                        <p class="card-description">
                            {{$user->githubUser->bio}}
                        </p>
                        <div class="footer">
                            @if($user->githubUser->profile_url)
                                <a href="{{$user->githubUser->profile_url}}" target="_blank"
                                   class="btn btn-just-icon btn-simple btn-github">
                                    <i class="fa fa-github"></i>
                                </a>
                            @endif
                            @if($user->website)
                                <a href="{{$user->website}}" class="btn btn-just-icon btn-simple btn-google"
                                   target="_blank">
                                    <i class="fa fa-globe"></i>
                                </a>
                            @endif
                            @if($user->id == Auth::user()->id)
                                <a href="/perfil/actualizar/{{$user->id}}"
                                   class="btn btn-success btn-simple btn-round pull-right">
                                    <i class="fa fa-pencil"></i> Editar
                                </a>
                            @endif
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
            <div class="col-xs-12">
                <div class="card">
                    <div class="content">
                        <h3 class="category-social">Logros</h3>
                        <br>
                        <div class="badge-container">
                            @if(count($user->badges))
                                @foreach($user->badges as $badge)
                                    <div class="badge">
                                        <img src="img/badges/{{$badge->image}}" alt="">
                                    </div>
                                @endforeach
                            @else
                                @component('components.notification')
                                    @slot('type')
                                        danger
                                    @endslot
                                    Obtén tu primera medalla al publicar un recurso!
                                @endcomponent
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                                <input type="text" class="form-control" name="nombre" value="{{$user->name}}">
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
                        --}}{{--<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>--}}{{--
                    </div>
                </div>
            </div>--}}
        </div>
    </div>

    </div>

@stop
@extends('layouts.master')

@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="row">
        @include('partials.flash-message')
        <div class="col-xs-12">
            <div class="card" style="margin-top: 2em;">
                <div class="content">
                    {!! Form::open(['url' => '/buscar', 'method' => 'GET']) !!}
                    <div class="form-group">
                        <input type="text" class="form-control" name="searching"
                               value="{{ (isset($searching) && $searching != 'Últimos recursos agregados') ? $searching : ''}}"/>
                    </div>

                    <div style="display: inline;">
                        @foreach($types as $key => $type)
                            <div class="checkbox" style="display: inline">
                                <label>
                                    @if(isset($filtering))
                                        {{ Form::checkbox($type->name, null, ($filtering[$key]) ? true : false)}}{{$type->name}}
                                    @else
                                        {{ Form::checkbox($type->name, null, false)}}{{$type->name}}
                                    @endif
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div style="display: inline;">
                        {{--<input type="button" class="btn btn-github btn-sm btn-round" value="Filtros"/>--}}
                    </div>
                    <input type="submit" class="btn btn-rose btn-block" value="Buscar" style="display: block;">
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    @if(!Auth::user() && session('Sign-in', 'true'))
        <div class="row">
            <div class="col-xs-12">
                <div class="alert alert-warning">
                    <div class="container-fluid">
                        <div class="alert-icon">
                            <i class="material-icons">error_outline</i>
                        </div>
                        <button id="close-message" type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="material-icons">clear</i></span>
                        </button>
                        <h4 class="card-title">
                            <a href="#">
                                Iniciando sesión podrías:
                            </a>
                        </h4>
                        <p>
                            <i class="fa fa-crosshairs" style="font-weight: bold;"></i>
                            Compartir material del cual has aprendido
                        </p>
                        <p>
                            <i class="fa fa-crosshairs" style="font-weight: bold;"></i>
                            Dar fav a los recursos que has encontrado interesantes
                        </p>
                        <a href="/login/github" class="btn btn-github">
                            Entrar con Github
                            <i class="fa fa-github"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-8">
            @if(count($recursos))
                {{--Tu búsqueda: <a href="#" style="font-style: italic">{{$searching}}</a>--}}
                @foreach($recursos as $recurso)

                    <div class="card searching-card">
                        <div class="content">
                            <h6 class="category text-{{$recurso->class}}">
                                <i class="fa fa-{{$recurso->icon}}"></i> {{$recurso->tipo}}
                            </h6>
                            <h4 class="card-title">
                                <a href="#">{{$recurso->name}}</a>
                            </h4>
                            <p>
                                {{substr($recurso->description, 0, 350).'...'}}
                            </p>
                            <div class="footer">
                                <div class="author">
                                    <a href="#pablo">
                                        <img src="{{\App\User::find($recurso->user_id)->githubUser->avatar ?? 'http://i.pravatar.cc/150?img=3'}}"
                                             alt="..." class="avatar img-raised">
                                        <span>{{$recurso->usuario}} {{Carbon\Carbon::parse($recurso->created_at)->diffForHumans()}}</span>
                                    </a>
                                </div>
                                <div class="stats">
                                    <a href="#" class="btn btn-github btn-sm btn-round btn-modal"
                                       data-id="{{$recurso->id}}">
                                        Ver más &nbsp;&nbsp;
                                        <i class="fa fa-external-link" style="font-size: 12px;"></i>
                                    </a>
                                    {{--<a href="{{$recurso->link}}" target="_blank"
                                       class="btn btn-github btn-sm btn-round">
                                        <i>Ir al sitio!</i>
                                    </a>--}}
                                    @if(session('usuario_id', ''))
                                        <button class="btn btn-warning btn-sm btn-simple btn-round btn-star"
                                                data-id="{{$recurso->id}}">
                                            <i class="fa fa-star"></i> <span
                                                    class="star-counter">{{ count(\App\Resource::find($recurso->id)->stars) }}</span>
                                        </button>
                                    @else
                                        <button class="btn btn-warning btn-sm btn-simple">
                                            <i class="fa fa-star"></i> <span
                                                    class="star-counter">{{ count(\App\Resource::find($recurso->id)->stars) }}</span>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--<div class="card card-blog card-plain">
                        <div class="card-image">
                            <a href="#pablo">
                                <img class="img" src="assets/img/examples/blog6.jpg"/>
                            </a>
                        </div>

                        <div class="content">
                            <h6 class="category text-{{$recurso->class}}">
                                <i class="fa fa-{{$recurso->icon}}"></i> {{$recurso->tipo}}
                            </h6>

                            <h4 class="card-title">
                                <a href="#pablo">{{$recurso->name}}</a>
                            </h4>

                            <p class="card-description">
                                {{$recurso->description}}
                            </p>

                            <div class="footer">
                                <div class="author">
                                    <a href="#pablo">
                                        <img src="assets/img/faces/marc.jpg" alt="..." class="avatar img-raised">
                                        <span>Mike John</span>
                                    </a>
                                </div>
                                <div class="stats">
                                    <i class="material-icons">schedule</i> 5 min read
                                </div>
                            </div>

                        </div>

                    </div>--}}

                    {{--<hr>
                    <h4>{{$recurso->name}}
                        <span class="label label-{{$recurso->class}}">
                                <i class="{{$recurso->icon}}"></i> {{$recurso->tipo}}
                            </span>
                        <span class="text-gray hidden-xs pull-right">Agregado por {{$recurso->user}} {{Carbon\Carbon::parse($recurso->created_at)->diffForHumans()}}</span>
                    </h4>
                    <p>{{$recurso->description}}</p>
                    <a href="{{$recurso->link}}" target="_blank" class="btn btn-link"><i>Ir al sitio!</i></a>
                    @if(session('usuario_id', ''))
                        <button class="btn btn-success btn-fav" data-id="{{$recurso->id}}">
                            <span class="star-counter">{{ count(\App\Resource::find($recurso->id)->stars) }}</span>
                            <i class="fa fa-star color-yellow"></i>
                        </button>
                    @else
                        <button class="btn btn-default btn-fav">37 <i class="fa fa-star color-yellow"></i>
                        </button>
                    @endif--}}
                @endforeach
                {{--@elseif (isset($searching) && $searching != '')--}}
            @else
                <div class="card">
                    <div class="content content-danger">
                        {{--<h5 class="category-social">
                            <i class="fa fa-times"></i>
                        </h5>--}}
                        <h4 class="card-title">
                            <a href="#pablo">No se encontraron rasultados para esta búsqueda</a>
                        </h4>
                        {{--<div class="footer">
                            <div class="author">
                                <a href="#pablo">
                                    <img src="assets/img/faces/avatar.jpg" alt="..." class="avatar img-raised">
                                    <span>Tania Andrew</span>
                                </a>
                            </div>
                            <div class="stats">
                                <i class="material-icons">favorite</i> 2.4K &middot;
                                <i class="material-icons">share</i> 45
                            </div>
                        </div>--}}
                    </div>
                </div>
                {{--@else
                    <p>Por favor define una búsqueda...</p>--}}
            @endif
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="content content-info">
                    <h4 class="card-title">
                        Top 3 de esta semana!
                    </h4>
                    <div class="card-description">
                        <a href="#" style="color: #FFF; display: block;">
                            <i class="fa fa-crosshairs" style="font-weight: bold;"></i>
                            <span style="margin-left: 5px; text-decoration: underline;">
                                PHP: The Good Practices
                            </span>
                        </a>
                        <a href="#" style="color: #FFF; display: block;">
                            <i class="fa fa-crosshairs" style="font-weight: bold;"></i>
                            <span style="margin-left: 5px; text-decoration: underline;">
                                From Zero to Hero: Python API Restful
                            </span>
                        </a>
                        <a href="#" style="color: #FFF; display: block;">
                            <i class="fa fa-crosshairs" style="font-weight: bold;"></i>
                            <span style="margin-left: 5px; text-decoration: underline;">
                                Javascript: Lo bueno y malo
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 text-center">
            {{$recursos->appends(['searching' => session('searching', ''), 'types' => session('types', '')])->links()}}
        </div>

        <div class="col-xs-12">
            <!-- Classic Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="material-icons">clear</i>
                            </button>
                            <h4 class="modal-title">Curso de PHP</h4>
                        </div>
                        <div class="modal-body">
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                               there live the blind texts. Separated they live in Bookmarksgrove right at the coast of
                               the Semantics, a large language ocean. A small river named Duden flows by their place and
                               supplies it with the necessary regelialia. It is a paradisematic country, in which
                               roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no
                               control about the blind texts it is an almost unorthographic life One day however a small
                               line of blind text by the name of Lorem Ipsum decided to leave for the far World of
                               Grammar.
                            </p>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                               there live the blind texts. Separated they live in Bookmarksgrove right at the coast of
                               the Semantics, a large language ocean. A small river named Duden flows by their place and
                               supplies it with the necessary regelialia. It is a paradisematic country, in which
                               roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no
                               control about the blind texts it is an almost unorthographic life One day however a small
                               line of blind text by the name of Lorem Ipsum decided to leave for the far World of
                               Grammar.
                            </p>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                               there live the blind texts. Separated they live in Bookmarksgrove right at the coast of
                               the Semantics, a large language ocean. A small river named Duden flows by their place and
                               supplies it with the necessary regelialia. It is a paradisematic country, in which
                               roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no
                               control about the blind texts it is an almost unorthographic life One day however a small
                               line of blind text by the name of Lorem Ipsum decided to leave for the far World of
                               Grammar.
                            </p>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                               there live the blind texts. Separated they live in Bookmarksgrove right at the coast of
                               the Semantics, a large language ocean. A small river named Duden flows by their place and
                               supplies it with the necessary regelialia. It is a paradisematic country, in which
                               roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no
                               control about the blind texts it is an almost unorthographic life One day however a small
                               line of blind text by the name of Lorem Ipsum decided to leave for the far World of
                               Grammar.
                            </p>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-rose btn-link" target="_blank">Visitar sitio</a>
                            <button type="button" class="btn btn-warning">
                                <i class="fa fa-star"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!--  End Modal -->
        </div>

    </div>

@endsection

@section('script')
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        toastr.options = {
            "positionClass": "toast-bottom-right"
        };

        function notify(type, message) {
            if (type == 'success') {
                toastr.success(message);
            } else if (type == 'error') {
                toastr.error(message);
            }
        }

        $('.btn-star').click(function (e) {
            var btn = this;
            var id = $(this).data('id');
            $.ajax({
                url: '{{url('/star/fav')}}',
                method: 'POST',
                data: {id: id},
                dataType: 'JSON',
                success: function (response) {
                    console.log(response);
                    if (response.status === 'success') {
                        var counter = parseInt($(btn).find('.star-counter').html());
                        console.log(counter);
                        counter++;
                        $(btn).find('.star-counter').html(counter);
                        notify(response.status, response.message);
                    } else {
                        notify(response.status, response.message);
                    }
                },
                error: function (response) {
                    notify('error', 'You need to login to fav');
                }
            });
        });

        $('.close').click(function (e) {
            $.ajax({
                url: '{{'/messages/close/signin'}}',
                method: 'POST',
                dataType: 'JSON',
                success: function (response) {
                    console.log(response);
                }
            });
        });

        $('.btn-modal').click(function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url: '/api/resource/' + id,
                method: 'GET',
                dataType: 'JSON',
                success: function (response) {
                    setModal(response.data.resource);
                },
                error: function () {
                    notify('error', 'Ocurrio un problema')
                }
            });
            $('#myModal').modal('show');
        });

        function setModal(resource) {
            console.log(resource);
            $('.modal-title').html(resource.name);
            $('.modal-body').html(resource.description);
            $('.btn-link').attr('href', resource.link);
        }
    </script>
@endsection
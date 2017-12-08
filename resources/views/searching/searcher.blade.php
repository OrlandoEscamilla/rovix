@extends('layouts.master')

@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="row">
        @include('partials.flash-message')
        <div class="col-xs-12">
            <div class="card" style="margin-top: 2em;">
                <div class="content">
                    <div class="form-group">
                        <input type="text" class="form-control" name="searching" id="search-box"
                               value="{{$searching}}"/>
                    </div>
                    <div id="formats"></div>
                    <div id="sorting"></div>
                    <div id="sorting-price"></div>
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
            <div id="hits"></div>
            <div id="pagination" class="text-center"></div>
        </div>

        <div class="col-md-4">
            @if(count($topViewed))
                @component('components.top-three', ['elements' => $topViewed['elements']])
                    @slot('type')
                        {{$topViewed['type']}}
                    @endslot
                    @slot('title')
                        {{$topViewed['title']}}
                    @endslot
                @endcomponent
            @endif

            @if(count($topStarred))
                @component('components.top-three', ['elements' => $topStarred['elements']])
                    @slot('type')
                        {{$topStarred['type']}}
                    @endslot
                    @slot('title')
                        {{$topStarred['title']}}
                    @endslot
                @endcomponent
            @endif

            <div class="card card-algolia">
                <div class="content">
                    <h4 class="card-title"></h4>
                    <div class="card-description text-center">
                        <img src="img/algolia-logo.svg" alt="">
                    </div>
                </div>
            </div>
        </div>

        <script type="text/html" id="refinement-list">
            <div class="checkbox" style="display: inline">
                <label>
                    <input id="@{{index}}" name="@{{value}}" class="is-checkbox"
                           type="checkbox" @{{#isRefined}}checked@{{/isRefined}}>
                    <span class="checkbox-material">
                        <span class="check"></span>
                    </span>
                    @{{label}}
                    <span class="filter-counter">
                        @{{#helpers.formatNumber}}@{{count}}@{{/helpers.formatNumber}}
                    </span>
                </label>
            </div>
        </script>

        <script type="text/html" id="hit-card">
            <div class="card searching-card">
                <div class="content">
                    <h6 class="category text-@{{format.class}}">
                        <i class="fa fa-@{{format.icon}}"></i> @{{format.name}}
                    </h6>
                    <h4 class="card-title">
                        <a href="#">@{{name}}</a>
                    </h4>
                    {{--<textarea id="md_viewer_preview">@{{short_description}}</textarea>--}}
                    <p>@{{short_description}}</p>
                    <div class="footer">
                        <div class="author">
                            <a href="#">
                                <img src="@{{avatar}}" alt="..." class="avatar img-raised">
                                <span>@{{user.name}} @{{created_at}}</span>
                            </a>
                        </div>
                        <div class="stats">
                            <a href="#" class="btn btn-github btn-sm btn-round btn-modal"
                               data-id="@{{id}}">
                                Ver más &nbsp;&nbsp;
                                <i class="fa fa-external-link" style="font-size: 12px;"></i>
                            </a>
                            {{--<a href="@{{link}}" target="_blank"
                               class="btn btn-github btn-sm btn-round"><i>Ir al sitio!</i></a>--}}
                            @if(session('usuario_id', ''))
                                <button class="btn btn-warning btn-sm btn-simple btn-round btn-star"
                                        data-id="@{{id}}">
                                    <i class="fa fa-star"></i> <span
                                            class="star-counter">@{{stars}}</span>
                                </button>
                            @else
                                <button class="btn btn-warning btn-sm btn-simple">
                                    <i class="fa fa-star"></i> <span
                                            class="star-counter">@{{stars}}</span>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </script>

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
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <textarea id="md-viewer" cols="30" rows="10"></textarea>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-rose btn-link" target="_blank">Visitar sitio</a>
                            <button type="button" class="btn btn-warning btn-star-modal" style="margin-right: 1em">
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

        var md_viewer = new SimpleMDE({
            "autoDownloadFontAwesome": false,
            "element": document.querySelector('#md-viewer'),
            "spellChecker": false,
            "status": false,
            "toolbar": false,
        });

        $('#hits').on('click', '.btn-star', function (e) {
            var btn = this;
            var id = $(this).data('id');
            ajaxStarItem(id, btn);
        });

        $('.btn-star-modal').click(function () {
            var btn = this;
            var id = $(this).data('id');
            if ($('.btn-star[data-id="' + id + '"]').length) {
                $('.btn-star[data-id="' + id + '"]').trigger('click');
            } else {
                notify('error', 'You need to login to fav!')
            }
        });

        $('.close').click(function (e) {
            $.ajax({
                url: '{{'/messages/close/signin'}}',
                method: 'POST',
                dataType: 'JSON',
                success: function (response) {
                }
            });
        });

        const search = instantsearch({
            appId: '99T6Y4E2VG',
            apiKey: '39847ec74ca2eb54c004eeb69e8070dc',
            indexName: '{{env('SCOUT_PREFIX', '').'resources'}}',
            urlSync: false
        });

        search.addWidget(
            instantsearch.widgets.searchBox({
                autofocus: true,
                container: '#search-box',
                poweredBy: false
            })
        );

        search.addWidget(
            instantsearch.widgets.refinementList({
                container: '#formats',
                attributeName: 'format.name',
                operator: 'or',
                limit: 10,
                templates: {
                    item: document.querySelector("#refinement-list").innerHTML
                },
                sortBy: []
            })
        );

        search.addWidget(
            instantsearch.widgets.sortBySelector({
                container: '#sorting',
                indices: [
                    {name: '{{env('SCOUT_PREFIX', '').'resources'}}', label: 'Lo más nuevo'},
                    {name: '{{env('SCOUT_PREFIX', '').'resources_ranking_starred'}}', label: 'Lo más popular'}
                ],
                label: 'Ordenar por:'
            })
        );

        /*search.addWidget(
         instantsearch.widgets.sortBySelector({
         container: '#sorting-price',
         indices: [
         {name: 'resources', label: 'Todos'},
         {name: 'Gratis', label: 'Gratis'},
         //{name: 'De pago', label: 'De pago'},
         ],
         label: 'Precio:'
         })
         );*/

        search.addWidget(
            instantsearch.widgets.hits({
                container: '#hits',
                hitsPerPage: 2,
                templates: {
                    empty: '<h4>No se encontraron resultados para la búsqueda: <b>@{{query}}</b></h4>',
                    item: document.querySelector("#hit-card").innerHTML
                },
                transformData: {
                    item: function (item) {
                        item.created_at = diffForHumans(item.created_at);
                        item.avatar = avatar(item.user);
                        item.short_description = strip(item.short_description);
                        return item;
                    }
                }
            })
        );

        search.addWidget(
            instantsearch.widgets.pagination({
                container: '#pagination'
            })
        );

        search.start();

        function diffForHumans(created_at) {
            return moment(created_at + '').from(moment());
        }

        function avatar(user) {
            if (user.avatar) {
                return '/img/' + user.avatar;
            }
            return user.github_user.avatar;
        }

        function strip(html) {
            var tmp = document.createElement("DIV");
            tmp.innerHTML = html;
            return tmp.textContent || tmp.innerText;
        }

        $('#hits').on('click', '.btn-modal', function (e) {
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
            $('.modal-title').html(resource.name);
            if (md_viewer.isPreviewActive()) {
                md_viewer.togglePreview();
            }
            md_viewer.value(resource.description).togglePreview();
            $('.btn-link').attr('href', resource.link);
            $('.btn-star-modal').attr('data-id', resource.id);
        }

        function ajaxStarItem(id, btn) {
            $.ajax({
                url: '{{url('/star/fav')}}',
                method: 'POST',
                data: {id: id},
                dataType: 'JSON',
                success: function (response) {
                    console.log(response);
                    if (response.status === 'success') {
                        var counter = parseInt($(btn).find('.star-counter').html());
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
        }

        function notify(type, message) {
            if (type === 'success') {
                toastr.success(message);
            } else if (type === 'error') {
                toastr.error(message);
            }
        }

    </script>
@endsection
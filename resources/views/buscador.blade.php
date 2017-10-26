@extends('layouts.master')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="row">
        @include('partials.flash-message')
        <div class="col-sm-10 col-sm-offset-1">
            <div class="card card-pricing card-product">
                <div class="content">
                    {!! Form::open(['url' => '/buscar', 'method' => 'GET']) !!}
                    <input type="text" class="form-control" name="searching"
                           value="{{ (isset($searching) && $searching != 'Últimos recursos agregados') ? $searching : ''}}"/>
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
                    <input type="submit" class="btn btn-primary" value="Buscar" style="display: block;">
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="card card-pricing card-product">
                <div class="content text-left">
                    @if(isset($recursos))
                        Tu búsqueda: <a href="#" style="font-style: italic">{{$searching}}</a>
                        @foreach($recursos as $recurso)
                            <hr>
                            <h4>{{$recurso->name}}
                                <span class="label {{$recurso->class}}">
                                <i class="{{$recurso->icon}}"></i> {{$recurso->tipo}}
                            </span>
                                <span class="text-gray hidden-xs pull-right">Agregado por {{$recurso->user}} {{Carbon\Carbon::parse($recurso->created_at)->diffForHumans()}}</span>
                            </h4>
                            <p>{{$recurso->description}}</p>
                            <a href="#" class="btn btn-link"><i>Ir al sitio!</i></a>
                            @if(session('usuario_id', ''))
                                <button class="btn btn-success btn-fav" data-id="{{$recurso->id}}">
                                    <span class="star-counter">{{ count(\App\Resource::find($recurso->id)->stars) }}</span>
                                    <i class="fa fa-star color-yellow"></i>
                                </button>
                            @else
                                <button class="btn btn-default btn-fav">37 <i class="fa fa-star color-yellow"></i>
                                </button>
                            @endif
                        @endforeach
                        <br>
                        <div class="text-center">
                            {{$recursos->appends(['searching' => session('searching', ''), 'types' => session('types', '')])->links()}}
                        </div>
                    @elseif (isset($searching) && $searching != '')
                        <p>No se encontraron resultados para esta búsqueda</p>
                    @else
                        <p>Por favor define una búsqueda...</p>
                    @endif
                </div>
            </div>
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

        $('.btn-filtro').click(function (e) {
            $('.filter-container').toggle();
        });

        function displayIfPicked() {
            if ($('input:checked').length) {
                $('.filter-container').show();
            }
        }

        function notify(type, message) {
            var alert = $('.alert');

            $(alert).addClass(type).show(500);
            $('.alert strong').html(message);
            setTimeout(function () {
                $(alert).removeClass(type).hide(500);
            }, 1750);

        }

        $('.btn-fav').click(function (e) {
            var btn = this;
            var id = $(this).data('id');
            $.ajax({
                url: '{{url('/star/fav')}}',
                method: 'POST',
                data: {id: id},
                dataType: 'JSON',
                success: function (response) {
                    console.log(response);
                    if (response.status === 'OK') {
                        var counter = parseInt($(btn).find('.star-counter').html());
                        console.log(counter);
                        counter++;
                        $(btn).find('.star-counter').html(counter);
                        notify('alert-success', response.message);
                    } else {
                        notify('alert-danger', response.message);
                    }
                },
                error: function (response) {
                    notify('alert-danger', 'You need to login to fav');
                }
            });
        });

        displayIfPicked();
    </script>
@endsection
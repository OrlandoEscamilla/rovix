@if ($message = Session::get('success'))
    {{--<div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>--}}
    <div class="alert alert-success">
        <div class="container-fluid">
            <div class="alert-icon">
                <i class="material-icons">error_outline</i>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="material-icons">clear</i></span>
            </button>
            {{$message}}
        </div>
    </div>
@endif

@if ($message = Session::get('error'))
    {{--<div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>--}}
    <div class="alert alert-danger">
        <div class="container-fluid">
            <div class="alert-icon">
                <i class="material-icons">error_outline</i>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="material-icons">clear</i></span>
            </button>
            {{$message}}
        </div>
    </div>
@endif

@if ($message = Session::get('warning'))
    {{--<div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>--}}
    <div class="alert alert-warning">
        <div class="container-fluid">
            <div class="alert-icon">
                <i class="material-icons">error_outline</i>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="material-icons">clear</i></span>
            </button>
            {{$message}}
        </div>
    </div>
@endif

@if ($message = Session::get('info'))
    {{--<div class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>--}}
    <div class="alert alert-info">
        <div class="container-fluid">
            <div class="alert-icon">
                <i class="material-icons">error_outline</i>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="material-icons">clear</i></span>
            </button>
            {{$message}}
        </div>
    </div>
@endif

{{--
@if ($errors->any())
    --}}
{{--<div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Please check the form below for errors
    </div>--}}{{--

    <div class="alert alert-danger">
        <div class="container-fluid">
            <div class="alert-icon">
                <i class="material-icons">error_outline</i>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="material-icons">clear</i></span>
            </button>
            {{$message}}
        </div>
    </div>
@endif--}}

@if ($message = Session::get('success'))
    @component('components.alert')
        @slot('type')
            success
        @endslot
        {{$message}}
    @endcomponent
@endif

@if ($message = Session::get('error'))
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

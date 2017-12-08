{!! Form::open(['url' => $url, 'method' => $method]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <div class="form-group">
            <label>Tipo de recurso:</label>
            {{Form::select('type_id', $types, (isset($recurso) ? $recurso->type_id : ''), ['class' => 'select form-control'])}}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Nombre del recurso:</label>
            <input type="text" name="name" class="form-control" value="{{isset($recurso) ? $recurso->name : ''}}">
            @if($errors->has('name'))
                <span class="label label-danger">{{$errors->first('name')}}</span>
            @endif
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Formato:</label>
            {{Form::select('format_id', $formats, (isset($recurso) ? $recurso->format_id : ''), ['class' => 'select form-control'])}}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Lenguaje:</label>
            {{Form::select('language_id', $languages, (isset($recurso) ? $recurso->language_id : ''), ['class' => 'select form-control'])}}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="has_cost">
                    Es un recurso de pago
                </label>
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <label>Enlace:</label>
            {{Form::text('link', (isset($recurso) ? $recurso->link : ''), ['class' => 'form-control'])}}
            @if($errors->has('link'))
                <span class="label label-danger">{{$errors->first('link')}}</span>
            @endif
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <label>Descripción:</label>
            {{Form::textarea('description', (isset($recurso) ? $recurso->description : ''), ['id' => 'text-editor', 'class' => 'form-control', 'size' => '1x4'])}}
            @if($errors->has('description'))
                <span class="label label-danger">{{$errors->first('description')}}</span>
            @endif
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <label>Tags:</label>
            <input name="tags" class="tagsinput tag-rose" value="{{isset($recurso) ? $recurso->tags : ''}}"/>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group text-center">
            <input type="submit" class="btn btn-github" value="Guardar">
        </div>
    </div>
</div>
{!! Form::close() !!}
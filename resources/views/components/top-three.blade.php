<div class="card">
    <div class="content content-{{$type}}">
        <h4 class="card-title">
            {{$title}}
        </h4>
        <div class="card-description">
            @foreach($elements as $element)
                <a href="#" style="color: #FFF; display: block;">
                    <i class="fa fa-crosshairs" style="font-weight: bold;"></i>
                    <span style="margin-left: 5px; text-decoration: underline;">
                        {{$element}}
                    </span>
                </a>
            @endforeach
        </div>
    </div>
</div>
@extends('layout.layout')

@section('title')
    Mapa de la ciudad
@endsection

@section('content')

    <div class="content">

        <table cellpadding="1" cellspacing="1">

        @foreach($grid->boxes as $row)
            <tr>
            @foreach($row as $box)
                {!! $box->html !!}
            @endforeach
            </tr>
        @endforeach

        </table>

    </div>

@endsection


@section('scripts')
    @parent

    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js" type="text/javascript"></script>
    {!! Html::script("js/mapa.js") !!}

@endsection


@section('styles')
    @parent

    <link href="css/mapa.css" rel="stylesheet" type="text/css">

@endsection
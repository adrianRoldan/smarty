@extends('layout.layout')

@section('title')
    Registro de logs de comunicación MQTT
@endsection

@section('content')

    <div class="content">

        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="panel panel-body border-top-primary text-center">
                    <h6 class="no-margin text-semibold">Registro de logs de comunicación MQTT</h6>
                    <p class="text-muted content-group-sm">Registro de logs de comunicación MQTT</p>
                    <table class="table DataTables">
                        <theader>
                            <tr>
                                <th>Procendecia</th>
                                <th>Topico</th>
                                <th>Mensaje Original</th>
                                <th>Fecha envio</th>
                                <th>Hora recepción</th>
                            </tr>
                        </theader>
                        <tbody id="mqttlogs">
                        @foreach($logs as $log)
                            <tr class="text-left">
                                <td>{{ $log->logueable->nombre }}</td>
                                <td>{{ $log->topico }}</td>
                                <td>{{ $log->mensaje }}</td>
                                <td>{{ $log->fechaEnvio }}</td>
                                <td>{{ date('H:i:s', strtotime($log->created_at)) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    @parent

    {!! Html::script("js/paho.javascript-1.0.2/mqttws31.js") !!}
    {!! Html::script("js/logs.js") !!}

@endsection
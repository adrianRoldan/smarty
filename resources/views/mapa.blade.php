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


    <div class="modal fade bs-example-modal-sm" id="modalEstado" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p> Ip: <span class="ip"></span><br/>
                        Mac: <span class="mac"></span><br/>
                        Ubicación: <span class="ubicacion"></span><br/>
                        Nombre: <span class="nombre"></span>
                    </p>
                    <div class="form-group">
                        <label>
                            Cambiar estado del semáforo:
                        </label>
                        <select id="estado" class="bootstrap-select" data-width="100%">
                            <option value=""></option>
                            <option value="green" class="special-class-green">Verde</option>
                            <option value="red" class="special-class">Rojo</option>
                            <option value="emgcy" class="special-class-emergency">Emergencia</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="save" class="btn btn-primary">Guardar cambios</button>
                </div>
            </div><!-- /.modal-content -->
        </div>
    </div>

@endsection


@section('scripts')
    @parent

    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js" type="text/javascript"></script>
    {!! Html::script("assets/js/plugins/forms/selects/bootstrap_select.min.js") !!}
    {!! Html::script("assets/js/pages/form_bootstrap_select.js") !!}
    {!! Html::script("js/mapa.js") !!}

@endsection


@section('styles')
    @parent

    <link href="css/mapa.css" rel="stylesheet" type="text/css">

@endsection
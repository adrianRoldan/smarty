<!-- en el código html principal carpeta > layout > archivo layout -->
@extends('layout.layout')
<!-- añadimos título a esta vista -->
@section('title')
    Mapa de la ciudad
@endsection

<!-- esta parte substituiría a la sección @yield('content') del fichero mencionado arriba -->
@section('content')

    <div class="content">   <!-- nos permite formatar como un bloque (clase content) separado del resto (ej: recuadro relleno de negro bajo el texto) -->

        <table cellpadding="1" cellspacing="1">     <!-- creamos la tabla y le damos espaciado y "relleno" -->

        @foreach($grid->boxes as $row)              <!-- para cada fila -->
            <tr>
            @foreach($row as $box)                  <!-- para cada celda -->
                {!! $box->html !!}                  <!-- mostramos la celda según su propiedad html -->
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
                            <option value="blue" class="special-class-emergency">Emergencia</option>
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


@section('scripts')         <!-- enlace a la librería javascript de mqtt (comunicación) -->
    @parent                 <!-- en el fichero de arriba, @yield('scripts') se substituiría por esto que sigue -->

    {!! Html::script("js/paho.javascript-1.0.2/mqttws31.js") !!}
    {!! Html::script("assets/js/plugins/forms/selects/bootstrap_select.min.js") !!}
    {!! Html::script("assets/js/pages/form_bootstrap_select.js") !!}
    {!! Html::script("js/mapa.js") !!}

@endsection


@section('styles')          <!-- qué estilo usaremos -->
    @parent                 <!-- esta directiva permite incluir el contenido del diseño de esta vista para esta sección -->

    <link href="css/mapa.css" rel="stylesheet" type="text/css">     <!-- indica dónde encuentra el formato css que debe usar -->

@endsection
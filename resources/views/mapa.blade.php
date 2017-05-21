@extends('layout.layout')   <!-- en el código html principal carpeta > layout > archivo layout -->

@section('title')           <!-- añadimos título a esta vista -->
    Mapa de la ciudad
@endsection

@section('content')         <!-- esta parte substituiría a la sección @yield('content') del fichero mencionado arriba -->

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

@endsection


@section('scripts')         <!-- enlace a la librería javascript de mqtt (comunicación) -->
    @parent                 <!-- en el fichero de arriba, @yield('scripts') se substituiría por esto que sigue -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js" type="text/javascript"></script>
    {!! Html::script("js/mapa.js") !!}

@endsection


@section('styles')          <!-- qué estilo usaremos -->
    @parent                 <!-- esta directiva permite incluir el contenido del diseño de esta vista para esta sección -->

    <link href="css/mapa.css" rel="stylesheet" type="text/css">     <!-- indica dónde encuentra el formato css que debe usar -->

@endsection
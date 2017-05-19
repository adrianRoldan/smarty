@extends('layout.layout')

@section('title')
    Enviar publish
@endsection

@section('content')


    <div class="content">

        <h6 class="content-group text-semibold">
            Enviar mensaje a nodos inferiores
        </h6>

        <div class="row">
            <div class="col-ms-12 col-lg-6">
                <div class="panel panel-body border-top-primary text-center">
                    <h6 class="no-margin text-semibold">Boton publish </h6>
                    <p class="text-muted content-group-sm">Enviar publish a traves de broker</p>
                    <button type="button" id="sendToMosquitto" class="btn btn-danger btn-float btn-float-lg"><i class="icon-cloud-upload"></i> <span>Publicar</span></button>
                </div>
            </div>
            <div class="col-ms-12 col-lg-6">
                <div class="panel panel-body border-top-primary text-center">
                    <h6 class="no-margin text-semibold">Boton subscribe </h6>
                    <p class="text-muted content-group-sm">Suscribirse a topico (topico es casa/importante) </p>
                    <button type="button" id="bindMosquitto" class="btn btn-danger btn-float btn-float-lg"><i class="icon-cloud-upload"></i> <span>Suscribir</span></button>
                    <p class="text-muted content-group-sm">Hay que añadir campo para introducir topico suscripcion </p>
                </div>
            </div>
        </div>

    </div>

@endsection


@section('scripts')
    @parent
    {!! Html::script("js/gestor.js") !!}
@endsection

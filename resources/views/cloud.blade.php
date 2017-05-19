@extends('layout.layout')

@section('title')
 Sync Cloud
@endsection

@section('content')


<div class="content">

 <h6 class="content-group text-semibold">
  Sincronizar información con cloud
  <small class="display-block">Opciones básicas del servidor cloud</small>
 </h6>

 <div class="row">
  <div class="col-ms-12 col-lg-8">
   <div class="panel panel-body border-top-primary text-center">
    <h6 class="no-margin text-semibold">Registro comunicación cloud -> front-end ({{ $_SERVER['SERVER_ADDR'] }})</h6>
    <p class="text-muted content-group-sm">Últimos mensajes del cloud</p>
    <table class="table DataTables">
     <theader>
      <tr>
       <th>Procendecia</th>
       <th>Mensaje</th>
       <th>Fecha envio</th>
       <th>Hora recepción</th>
      </tr>
     </theader>
     <tbody id="cloudlogs">
      @foreach($logs as $log)
       <tr class="text-left">
        <td>{{ $log->dispositivo->nombre }} ({{ $log->dispositivo->ip }}:{{ $log->dispositivo->puerto }})</td>
        <td>{{ $log->mensaje }}</td>
        <td>{{ $log->fechaEnvio }}</td>
        <td>{{ date('H:i:s', strtotime($log->created_at)) }}</td>
       </tr>
       @endforeach
     </tbody>
    </table>
   </div>
  </div>
  <div class="col-ms-12 col-lg-4">
   <div class="panel panel-body border-top-primary text-center">
    <h6 class="no-margin text-semibold">Server Cloud ({{ config("adresses.cloud.ip") }})</h6>
    <p class="text-muted content-group-sm">Opciones básicas del servidor cloud</p>

    <!--<button type="button" class="btn btn-info btn-float"><i class="icon-search4"></i> <span>Leer Info</span></button>-->
    <button type="button" id="sendToCloud" class="btn btn-danger btn-float btn-float-lg"><i class="icon-cloud-upload"></i> <span>Enviar información</span></button>
    <!--<a href="#" class="btn btn-info btn-float btn-loading" data-loading-text="<i class='icon-spinner4 spinner'></i> <span>Update</span>"><i class="icon-cloud-download2"></i> <span>Obtener</span></a>-->
   </div>
  </div>
 </div>

</div>

@endsection


@section('scripts')
 @parent
 {!! Html::script("js/cloud.js") !!}
 {!! Html::script("js/clientWebsocket.js") !!}

@endsection

<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Inicio</span> - @yield("title")</h4>
        </div>

        <!--<div class="heading-elements">
            <div class="heading-btn-group">
                <a href="#" class="btn btn-link btn-flácoat text-size-small has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                <a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                <a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
            </div>
        </div>-->
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ url("/") }}"><i class="icon-home2 position-left"></i> Inicio</a></li>
            <li class="active">@yield("title")</li>
        </ul>

        <ul class="breadcrumb-elements">
            <li><a href="#"><i class="icon-comment-discussion position-left"></i> Soporte</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-gear position-left"></i>
                    Configuración
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#"><i class="icon-user-lock"></i> Cuenta</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-gear"></i> Toda la configuración</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /page header -->

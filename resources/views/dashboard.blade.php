@extends('layout.layout')

@section('title')
    Dashboard
@endsection

@section('header')
    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Inicio</span> - Dashboard</h4>
            </div>

            <!--<div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                    <a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                    <a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
                </div>
            </div>-->
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ url("/") }}"><i class="icon-home2 position-left"></i> Inicio</a></li>
                <li class="active">Dashboard</li>
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
@endsection

@section('content')

    <!-- Content area -->
    <div class="content">

        <!-- Main charts -->
        <div class="row">
            <div class="col-lg-7">

                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h6 class="panel-title">Panel principal</h6>
                        <div class="heading-elements">
                            <form class="heading-form" action="#">
                                <div class="form-group">
                                    <label class="checkbox-inline checkbox-switchery checkbox-right switchery-xs">
                                        <input type="checkbox" class="switch" checked="checked">
                                        Live update:
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="container-fluid">

                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h6 class="panel-title">Más contenido</h6>
                        <div class="heading-elements">
                            <form class="heading-form" action="#">
                                <div class="form-group">
                                    <label class="checkbox-inline checkbox-switchery checkbox-right switchery-xs">
                                        <input type="checkbox" class="switch" checked="checked">
                                        Live update:
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="container-fluid">

                    </div>
                </div>
            </div>
        </div>

        @include('layout.footer')
    </div>
    <!-- /content area -->

@endsection
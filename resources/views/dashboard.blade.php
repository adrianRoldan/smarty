@extends('layout.layout')

@section('title')
    Dashboard
@endsection

@section('content')

    <!-- Content area -->
    <div class="content">

        <!-- Main charts -->
        <div class="row">
            <div class="col-lg-7">

                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h6 class="panel-title">Semáforo (C/ Fleming - C/ Aigua)</h6>
                        <div class="heading-elements">
                            <form class="heading-form" action="#">
                                <div class="form-group">
                                    <label class="checkbox-inline checkbox-switchery checkbox-right switchery-xs">
                                        <input type="checkbox" class="switch" checked="checked">
                                        Activo
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
                        <h6 class="panel-title">Semáforo (C/ St. Jordi - C/ Fleming)</h6>
                        <div class="heading-elements">
                            <form class="heading-form" action="#">
                                <div class="form-group">
                                    <label class="checkbox-inline checkbox-switchery checkbox-right switchery-xs">
                                        <input type="checkbox" class="switch" checked="checked">
                                        Activo
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="container-fluid">

                    </div>
                </div>
            </div>
            <div class="col-lg-7">

                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h6 class="panel-title">Semáforo (Rbla Pau - C/ Sitges)</h6>
                        <div class="heading-elements">
                            <form class="heading-form" action="#">
                                <div class="form-group">
                                    <label class="checkbox-inline checkbox-switchery checkbox-right switchery-xs">
                                        <input type="checkbox" class="switch" checked="checked">
                                        Activo
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
                        <h6 class="panel-title">Semáforo (C/ Rbla Sama - C/ Francesc Macia)</h6>
                        <div class="heading-elements">
                            <form class="heading-form" action="#">
                                <div class="form-group">
                                    <label class="checkbox-inline checkbox-switchery checkbox-right switchery-xs">
                                        <input type="checkbox" class="switch" checked="checked">
                                        Activo
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="container-fluid">

                    </div>
                </div>
            </div>
            <div class="col-lg-7">

                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h6 class="panel-title">Semáforo (C/ Josep Mascaro - C/ Geltrú)</h6>
                        <div class="heading-elements">
                            <form class="heading-form" action="#">
                                <div class="form-group">
                                    <label class="checkbox-inline checkbox-switchery checkbox-right switchery-xs">
                                        <input type="checkbox" class="switch" checked="checked">
                                        Activo
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
                        <h6 class="panel-title">Semáforo (C/ Zamenhof - C/ Ventosa)</h6>
                        <div class="heading-elements">
                            <form class="heading-form" action="#">
                                <div class="form-group">
                                    <label class="checkbox-inline checkbox-switchery checkbox-right switchery-xs">
                                        <input type="checkbox" class="switch">
                                        Activo
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
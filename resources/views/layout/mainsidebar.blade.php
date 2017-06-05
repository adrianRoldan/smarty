<!-- Main sidebar -->
<div class="sidebar sidebar-main sidebar-default">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user-material">
            <div class="category-content">
                <div class="sidebar-user-material-content">
                    <a href="#"><img src="img/logo_smarty.png" class="img-circle img-responsive" alt=""></a>
                    <h6>{{ auth()->user()->name }}</h6>
                    <span class="text-size-small">Vilanova, BCN</span>
                </div>

                <div class="sidebar-user-material-menu">
                    <a href="#user-nav" data-toggle="collapse"><span>Mi cuenta</span> <i class="caret"></i></a>
                </div>
            </div>

            <div class="navigation-wrapper collapse" id="user-nav">
                <ul class="navigation">
                    <li><a href="#"><i class="icon-user-plus"></i> <span>Mi perfil</span></a></li>
                    <li><a href="#"><i class="icon-comment-discussion"></i> <span><span class="badge bg-teal-400 pull-right">0</span> Mensajes</span></a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-cog5"></i> <span>Configuración</span></a></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="icon-switch2"></i>
                            <span>Salir</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li class="active"><a href="{{ url("/") }}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                    <li class="active"><a href="{{ url("/logs") }}"><i class="icon-list3"></i> <span>Logs</span></a></li>
                    <!--<li class="active"><a href="{{ url("/cloud") }}"><i class="icon-cloud-check"></i> <span>Sync Cloud</span></a></li>
                    <li class="active"><a href="{{ url("/broker") }}"><i class="icon-cloud-check"></i> <span>Broker</span></a></li>-->
                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->
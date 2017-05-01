<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layout.head')
    </head>

    <body>

        @include('layout.navbar')

        <!-- Page container -->
        <div class="page-container">

            <!-- Page content -->
            <div class="page-content">

                @include('layout.mainsidebar')

                <!-- Main content -->
                <div class="content-wrapper">

                    @include('layout.header')
                    @yield('content')
                </div>
                <!-- /main content -->

            </div>
            <!-- /page content -->

        </div>
        <!-- /page container -->
        @yield('scripts')
    </body>
</html>

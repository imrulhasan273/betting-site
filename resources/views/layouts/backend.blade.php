<!DOCTYPE html>
<html lang="en">
<head>
    <!-- STYLES -->
    @include('backend_partials.styles')
    <!-- STYLES -->
</head>
<body class="">
    <div class="wrapper ">

        <!-- SIDE BAR -->
        @include('backend_partials.sidebar')
        <!-- SIDE BAR -->

        <div class="main-panel">

            <!-- NAV BAR -->
            @include('backend_partials.navbar')
            <!-- NAV BAR -->

            <!-- MAIN CONTENT -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <!-- MAIN CONTENT -->

        </div>
    </div>

    <!-- SCRIPT FILES -->
    @include('backend_partials.scripts')
    <!-- SCRIPT FILES -->

</body>
</html>

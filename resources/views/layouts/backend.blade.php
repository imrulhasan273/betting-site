@include('backend_partials.styles')

<body class="">
  <div class="wrapper ">

    <!--  Start Side Bar -->
    @include('backend_partials.sidebar')
    <!--  End Side Bar -->

    <div class="main-panel">

        <!-- Start mavbar Section -->
        @include('backend_partials.navbar')
        <!-- End navbar Section -->

        <!-- Start Main Content -->
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <!-- End Main Content -->
    </div>
  </div>

@include('backend_partials.scripts')

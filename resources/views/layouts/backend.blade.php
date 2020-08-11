@include('backend_partials.styles')
<body class="">
  <div class="wrapper ">

    @include('backend_partials.sidebar')

    <div class="main-panel">


    @include('backend_partials.navbar')


        <div class="content">
            <div class="container-fluid">
    @yield('content')
</div>
</div>
    </div>
</div>
@include('backend_partials.scripts')

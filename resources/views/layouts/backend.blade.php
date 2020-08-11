@include('backend_partials.styles')
<body class="">
  <div class="wrapper ">

    @include('backend_partials.sidebar')

    <div class="main-panel">

    @include('backend_partials.navbar')

    @yield('content')

    </div>
</div>
@include('backend_partials.scripts')

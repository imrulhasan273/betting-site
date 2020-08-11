<!DOCTYPE html>
<html lang="en">
<head>
  <title>Betting Site | Bangladesh</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="85TZ3WjNSpmgIR3wHYSs0Cr5NdQRIGbWaxuojkDC">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>

  <script src="frontend/js/menuslider.js"></script>
  <script type="text/javascript" src="{{asset('frontend/js/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('frontend/js/dataTables.bootstrap.min.js')}}"></script>
  <script src="{{asset('frontend/js/eosMenu.js')}}" type="text/javascript" charset="utf-8"></script>

  <link rel="stylesheet" href="{{asset('frontend/css/css.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/footer-basic-centered.css')}}">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

  <link rel="stylesheet" href="{{asset('frontend/css/statementAndWallet.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/headerStyle.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/eosMenu.css')}}">

  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('frontend/custom/main.css')}}">
</head>

<body style="background: #E8E8E8">

    <!--START THIS PART IS THE PART OF NAVIGATION BAR USING MODAL (LOGIN / REG) -->
    {{-- @guest --}}
    @include('frontend_partials.login')
    @include('frontend_partials.registration')
    <!--START THIS PART IS THE PART OF NAVIGATION BAR USING MODAL (LOGIN / REG) -->

    <!--Start Body-->
    <div class="" id="allbody">

        <!-- Start User Panel -->
        @include('frontend_partials.userpanel')
        <!-- End User Panel -->

        <!-- Start Nav bar -->
        @include('frontend_partials.navbar')
        <!-- End Nav bar -->

        <!--Start Content Section -->
        @yield('content')
        <!--End Content Section -->

        <button type="button" id="betslip_toolkit" style="position: fixed;right: 10px;bottom:20px;display: none;">Bet Slip <span style="color:red;" id="total_multi">0</span></button>

        @include('frontend_partials.footer')

        <!-- Start All the Modals -->
        @include('frontend_partials.modals')
        <!-- End All the Modals -->

    </div>
    <!--End Body-->

    <!-- Start All the JQuery-Ajax Files -->
    @include('frontend_partials.scripts')
    <!-- End All the JQuery Files -->

</html>

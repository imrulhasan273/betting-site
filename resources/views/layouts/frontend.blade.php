<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend_partials.styles')
</head>

<body style="background: #E8E8E8">

    <div style="text-align: center">
        <x-alert/>
    </div>

    <!--START THIS PART IS THE PART OF NAVIGATION BAR USING MODAL (LOGIN / REG) -->
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

        <!-- Start Footer Section -->
        @include('frontend_partials.footer')
        <!-- End Footer Section -->


        <!-- Start All the Modals -->
        @include('frontend_partials.modals')
        <!-- End All the Modals -->

    </div>
    <!--End Body-->

    <!-- Start All the JQuery-Ajax Files -->
    @include('frontend_partials.scripts')
    <!-- End All the JQuery Files -->
</html>

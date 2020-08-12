@extends('layouts.frontend')
@section('content')
<!-- START CONTENT UPPER SECION -->
<div class="row" style="background: #E8E8E8;margin-left: 0px;margin-right: 0px;margin-top: 52px;">

    <!-- Start Header Section -->
    @include('home.partials_home.header')
    <!-- End Header Section -->

    <!--START HEADELINE -->
    @include('home.partials_home.headline')
    <!--END HEADELINE -->


    <!--START MATCH OPTION -->
    @include('home.partials_home.QuickMenu')
    <!--END MATCH OPTION -->

</div>
<!--END CONTENT UPPER SECION -->

<!-- START CONTENT -->
<div class="tab-content" id="content" style="margin-top: -113px;">
    <div class="tab-content" id="content" style="margin-top: -113px;">

      <!-------==========================Start cricket tab===========================--->
      @include('home.cricket')
      <!-------==============================End cricket tab==========================-->


      <!---------=================Start Basketball tab========================--->
      @include('home.basketball')
      <!---------==================End Basketball tab=========================--->

      <!--================Start Badminton tab=================================-->
      @include('home.badminton')
      <!-- ===============End Badminton tab==================================-->


      <!--===============Start football===============-->
      @include('home.football')
      <!--===============End football===============-->

      <!-------===============Start tenis tab===============----->
      @include('home.tennis')
      <!-------===============End tenis tab===============------>


      <!-------===============Start table tenis tab===============---->
      @include('home.tabletennis')
      <!-------===============End table tenis tab===============---->
    </div>

    <meta name="csrf-tokens" content="85TZ3WjNSpmgIR3wHYSs0Cr5NdQRIGbWaxuojkDC">

    @include('home.scripts')

</div>
<!-- END CONTENT -->
@endsection

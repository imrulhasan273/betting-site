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
    <div>
        <div id="loginnav" class="loginnav" style="display: none;">
            <a id="closenav" class="closebtn" style="float: right;
                                                    font-size: 34px;
                                                    margin-right: 10px;">×</a>
            <div class="">
            <p style="color: #FFE71E;position: absolute;
                        top: 20px;
                        left: 63px;
                        font-size: 20px;">Login your ID</p>
            <div id="errorSignIn" class="alert" role="alert">
                <button type="button" class="close" data-dismiss="" aria-hidden="true">
                ×
                </button> <strong id="alertsignin"> </strong><span id="signuperrorText"></span>
            </div>
            <form class="form-group">
                <div class="form-group" style="padding: 7px;margin-top: 60px;">
                <input type="text" name="user" id="user" placeholder="User Id" class="form-control fojFwL" style="margin-bottom: 10px;" />
                <input type="password" name="password" id="password" placeholder="Password" class="form-control fojFwL" style="margin-bottom: 10px;" />
                <button class="btn btn-success form-control" style="background: #FFE71E;color:#000" id="userSignInForm">Log In</button>
                </div>
            </form>
            </div>
        </div>
        <div id="registernav" class="loginnav" style="display: none;">
            <a id="closenavregister" class="closebtn" style="float: right;
                                                            font-size: 34px;
                                                            margin-right: 10px;">×
            </a>
            <div class="">
            <p style="color: #55fbe4;position: absolute;
                        top: 20px;
                        left: 63px;
                        font-size: 20px;">Create a new ID</p>
            <div id="errorSignUp" class="alert" role="alert">
                <button type="button" class="close" data-dismiss="" aria-hidden="true">
                ×</button> <strong id="alertSignUp"> </strong><span id="signuperrorText"></span>
            </div>
            <form class="form-group">
                <div class="form-group" style="padding: 7px;margin-top: 60px;">
                <input type="text" name="name" id="name" placeholder="FULL NAME" class="form-control fojFwL" style="margin-bottom: 10px;" />
                <input type="text" name="userId" id="userId" placeholder="USER ID" class="form-control fojFwL" style="margin-bottom: 10px;" />

                <input type="number" name="mobileNumber" id="mobileNumber" placeholder="MOBILE NO" class="form-control fojFwL" style="margin-bottom: 10px;" />
                <input type="email" name="email" id="email" placeholder="EMAIL" class="form-control fojFwL" style="margin-bottom: 10px;" />

                <select class="form-control fojFwL" id="club" name="club">
                    <option value="" disabled selected>Select Club</option>
                    <option value="sports24bd">sports24bd</option>}
                    option
                    <option value="Barisal Club">Barisal Club</option>
                </select>
                <br>
                <input type="text" name="sponsor_register" id="sponsor_register" placeholder="SPONSOR'S USERNAME" class="form-control fojFwL" style="margin-bottom: 10px;" />
                <input type="passworrd" name="passwordsignup" id="passwordsignup" placeholder="PASSWORD" class="form-control fojFwL" style="margin-bottom: 10px;" />
                <input type="passworrd" name="confirmPassword" id="confirmPassword" placeholder="CONFIRM PASSWORD" class="form-control fojFwL" style="margin-bottom: 10px;" />
                <button type="button" class="btn btn-success form-control" style="background: #55fbe4;color:#000" id="userSignUp">Register</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!--START THIS PART IS THE PART OF NAVIGATION BAR USING MODAL (LOGIN / REG) -->

    <!--Start Body-->
    <div class="" id="allbody">
        <div id="mySidenav" class="sidenav  ">
        <h2><i style="font-size: 27px;
                        left: 7px;color:#fff;
                        position: absolute;
                        top: 18px;" class="fa fa-bars fa-lg " onclick="closeNav();" aria-hidden="true">
            </i>
            <a style="color: #fff;
                    text-align: center;
                    font-size: 30px;
                    background: #147b45;
                    padding: 9px 3px;" href="{{ route('home')}}">
            </a>
        </h2>
        <div class="eos-menu" id="menu">
            <div class="eos-menu-content" style="height:360px;">
            <div class="eos-group-title"><i class="fa fa-user-tie" aria-hidden="true"></i> </div>
            <a style="padding:0px;font-size: 14px;" href="oneten.php">
                <div class="eos-group-title"><i aria-hidden="true"><img src="frontend/img/oneten.gif" style="max-width: 22px;"></i> OneTen</div>
            </a>
            <!--<a style="padding:0px;font-size: 14px;" href="coin_flip"><div class="eos-group-title"><i aria-hidden="true"><img src="frontend/img/coin.png" style="max-width: 22px;"></i> Coin Flip</div></a>-->
            <a style="padding:0px;font-size: 14px;" href="userLogout">
                <div class="eos-group-title"><i class="glyphicon glyphicon-log-out" aria-hidden="true"></i> Logout</div>
            </a>
            </div>
        </div>
        </div>

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

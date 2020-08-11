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
                    <option value="Tipper shawon club">Tipper shawon club</option>
                    <option value="BET LOVERS">BET LOVERS</option>
                    <option value="MaxBet Club">💎MaxBet Club💎</option>
                    <option value="Dark-Night">Dark-Night</option>
                    <option value="BD 24">BD 24</option>
                    <option value="5 Star Club">5 Star Club</option>
                    <option value="Munshiganj Club">Munshiganj Club</option>
                    <option value="RANGPUR CLUB">RANGPUR CLUB</option>
                    <option value="Dubai Club">Dubai 🇦🇪 Club</option>
                    <option value="Jamuna Club">Jamuna Club</option>
                    <option value="Rock Club">Rock Club</option>
                    <option value="King Club">King Club</option>
                    <option value="GURU CLUB"> 🌀BET-GURU CLUB🌀 </option>
                    <option value="Online Club">Online Club</option>
                    <option value="City club">City club</option>
                    <option value="Gazipur Club">Gazipur Club</option>
                    <option value="STARWARS">Star Wars</option>
                    <option value="THE-WORLD CLUB">THE-WORLD CLUB</option>
                    <option value="Dhaka club">Dhaka club</option>
                    <option value="Golden Club">Golden Club</option>
                    <option value="Real Madrid club">Real Madrid club</option>
                    <option value="FaridpurClub">Faridpur Club</option>
                    <option value="Superclub">Super Club</option>
                    <option value="Friends Club">Friends Club</option>
                    <option value="Help line club">Help line club</option>
                    <option value="Khulna Club">Khulna club</option>
                    <option value="Green Club">Green Club</option>
                    <option value="Lions Club">Lions Club</option>
                    <option value="WinBet Club"> 🏆 WinBet Club 🏆</option>
                    <option value="Australia Club ">Australia Club </option>
                    <option value="Davil Club">Davil Club</option>
                    <option value="CR7 CluB">CR7 CluB</option>
                    <option value="Update club">Update club</option>
                    <option value="Jessore Club">Jessore Club</option>
                    <option value="AsiaClub">Asia club</option>
                    <option value="SAKIB75 CLUB">SAKIB75 CLUB</option>
                    <option value="Bangladesh Club">Bangladesh Club</option>
                    <option value="Powerful Club">Powerful Club</option>
                    <option value="Welcome to Sports">Welcome to Sports</option>
                    <option value="Barcelona Club">Barcelona Club</option>
                    <option value="Indiaclub">Indiaclub</option>
                    <option value="Bet 365">Bet 365</option>
                    <option value="Help Line bdBet">Help Line bdBet</option>
                    <option value="STARS CLUB">STARS CLUB</option>
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
                    padding: 9px 3px;" href="index.php">sports24bd
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
        @include('frontend.navbar')
        <!-- End Nav bar -->

        <!--Start Content Section -->
        @yield('content')
        <!--End Content Section -->


        <button type="button" id="betslip_toolkit" style="position: fixed;right: 10px;bottom:20px;display: none;">Bet Slip <span style="color:red;" id="total_multi">0</span></button>

        @include('frontend.footer')

        <!-- Start All the Modals -->
        @include('frontend.modals')
        <!-- End All the Modals -->

    </div>
    <!--End Body-->

    <!-- Start All the JQuery-Ajax Files -->
    @include('frontend.scripts')
    <!-- End All the JQuery Files -->

</html>

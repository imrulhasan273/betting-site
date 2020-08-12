@if (Auth::user())
<div id="mySidenav" class="sidenav">
    <h2 style="padding-top: 17%;">
        <i style="font-size: 27px;
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
            @if (Auth::user())
                <div class="eos-group-title"><i class="fa fa-user-tie" aria-hidden="true"></i> {{ Auth::user()->name }}</div>
            @endif
            <div class="eos-group-title">
                <i class="fas fa-wallet" aria-hidden="true">
                </i>
                    My Wallet
                <i class="fa fa-angle-right fa-lg eos-pull-right" aria-hidden="true">
                </i>
            </div>
            <div style="" class="eos-group-content">
                <li class="eos-item">
                    Profile
                    <a href="#">
                        <i class="" aria-hidden="true">
                        </i>
                    </a>
                </li>

                <li class="eos-item">
                    Deposit
                    <a href="#" id="deposit-numberW" data-toggle="modal" data-target="#deposit">
                        <i class="" aria-hidden="true">
                        </i>
                    </a>
                </li>

                <li class="eos-item">
                    Withdraw
                    <a href="#" data-toggle="modal" data-target="#passwordverify">
                        <i class="" aria-hidden="true">
                        </i>
                    </a>
                </li>

                <li class="eos-item">
                    Balance Transfer
                    <a href="#" data-toggle="modal" data-target="#balanceTransferclub">
                        <i class="" aria-hidden="true">
                        </i>
                    </a>
                </li>
                <li class="eos-item">
                    Change Club
                    <a href="#" data-toggle="modal" data-target="#changeClub">
                        <i class="" aria-hidden="true">
                        </i>
                    </a>
                </li>
                <li class="eos-item">
                    Change Password
                    <a href="#" data-toggle="modal" data-target="#changePassword" >
                        <i class="" aria-hidden="true">
                        </i>
                    </a>
                </li>
            </div>
            <a style="padding:0px;font-size: 14px;" href="#"><div class="eos-group-title"><i class="fas fa-clipboard" aria-hidden="true"></i> My Statement</div></a>
            <a style="padding:0px;font-size: 14px;" href="#"><div class="eos-group-title"><i class="fas fa-user-secret" aria-hidden="true"></i> My Sponsor</div></a>
            <a style="padding:0px;font-size: 14px;" href="{{ route('oneten') }}">
                <div class="eos-group-title">
                <i aria-hidden="true">
                    <img src="frontend/img/oneten.gif" style="max-width: 22px;">
                </i> OneTen</div>
            </a>
            <!--<a style="padding:0px;font-size: 14px;" href="coin_flip"><div class="eos-group-title"><i aria-hidden="true"><img src="frontend/img/coin.png" style="max-width: 22px;"></i> Coin Flip</div></a>-->
            <a style="padding:0px;font-size: 14px;" href="{{route('logout')}}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <div class="eos-group-title">
                    <i class="glyphicon glyphicon-log-out" aria-hidden="true">
                    </i> Logout
                </div>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>
@endif

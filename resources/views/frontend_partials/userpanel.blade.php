@if (Auth::user())
<div id="mySidenav" class="sidenav">
    <h2 style="padding-top: 18%;"><i style="font-size: 27px;
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
        @if (Auth::user())
            <a style="padding:0px;font-size: 14px;" href="oneten.php">
                <div class="eos-group-title"><i aria-hidden="true"><img src="frontend/img/user1.png" style="max-width: 22px;"></i> {{ Auth::user()->name }}</div>
            </a>
        @endif
        <a style="padding:0px;font-size: 14px;" href="oneten.php">
            <div class="eos-group-title"><i aria-hidden="true"><img src="frontend/img/oneten.gif" style="max-width: 22px;"></i> OneTen</div>
        </a>
        <!--<a style="padding:0px;font-size: 14px;" href="coin_flip"><div class="eos-group-title"><i aria-hidden="true"><img src="frontend/img/coin.png" style="max-width: 22px;"></i> Coin Flip</div></a>-->
        <a style="padding:0px;font-size: 14px;" href="{{route('logout')}}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            <div class="eos-group-title"><i class="glyphicon glyphicon-log-out" aria-hidden="true"></i> Logout</div>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        </div>
    </div>
    </div>
@endif

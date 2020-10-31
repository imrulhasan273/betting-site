@php
    $authRole = Auth::check() ? Auth::user()->role->pluck('name')->toArray() : [];
    $authRole = $authRole[0] ?? null;
@endphp
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
                background: #4267B2;
                padding: 9px 3px;" href="{{ route('home')}}">
        </a>
    </h2>
    <div class="eos-menu" id="menu">
        <div class="eos-menu-content" style="height:360px;">
            @if (Auth::user())
                <div class="eos-group-title"><i class="fa fa-user-tie" aria-hidden="true"></i> {{ Auth::user()->name }}</div>
            @endif


            @if($authRole=='user')
            <div class="eos-group-title">
                <i class="subMenus" aria-hidden="true">
                </i>
                    My Wallet
                <i class="fa fa-angle-right fa-lg eos-pull-right" aria-hidden="true">
                </i>
            </div>



            <div style="" class="eos-group-content">
                <a style="padding:0px;font-size: 14px;" href="{{ route('profiles.profile') }}">
                    <div class="subMenus">
                    <i aria-hidden="true">
                        <img src="" style="max-width: 22px;">
                    </i> Profile</div>
                </a>
                <a style="padding:0px;font-size: 14px;" href="#" id="deposit-numberW" data-toggle="modal" data-target="#deposit">
                    <div class="subMenus">
                    <i aria-hidden="true">
                        <img src="" style="max-width: 22px;">
                    </i> Deposit</div>
                </a>

                <a data-toggle="modal" data-target="#widthdraw" style="padding:0px;font-size: 14px;" href="#">
                    <div class="subMenus">
                    <i aria-hidden="true">
                        <img src="" style="max-width: 22px;">
                    </i> Withdraw</div>
                </a>

                <a data-toggle="modal" data-target="#balanceTransfer" style="padding:0px;font-size: 14px;" href="#">
                    <div class="subMenus">
                    <i aria-hidden="true">
                        <img src="" style="max-width: 22px;">
                    </i> Balance Transfer</div>
                </a>

                <a data-toggle="modal" data-target="#changeClub" style="padding:0px;font-size: 14px;" href="#">
                    <div class="subMenus">
                    <i aria-hidden="true">
                        <img src="" style="max-width: 22px;">
                    </i> Change Club</div>
                </a>

                <a data-toggle="modal" data-target="#changePassword" style="padding:0px;font-size: 14px;" href="#">
                    <div class="subMenus">
                    <i aria-hidden="true">
                        <img src="" style="max-width: 22px;">
                    </i> Change Password</div>
                </a>
            </div>


             {{-- <div class="eos-group-title">
                <i class="subMenus" aria-hidden="true">
                </i>
                    Message
                <i class="fa fa-angle-right fa-lg eos-pull-right" aria-hidden="true">
                </i>
            </div>

             <div style="" class="eos-group-content">

                <a style="padding:0px;font-size: 14px;" href="{{ route('webmessage.index.user') }}">
                    <div class="subMenus">
                    <i aria-hidden="true">
                        <img src="" style="max-width: 22px;">
                    </i> Send Message</div>
                </a>

                  <a style="padding:0px;font-size: 14px;" href="{{ route('webmessage.view.user') }}">
                    <div class="subMenus">
                    <i aria-hidden="true">
                        <img src="" style="max-width: 22px;">
                    </i> Inbox</div>
                </a>
                  <a style="padding:0px;font-size: 14px;" href="{{ route('webmessage.view.user.sent') }}">
                    <div class="subMenus">
                    <i aria-hidden="true">
                        <img src="" style="max-width: 22px;">
                    </i> Sent Items</div>
                </a>
            </div> --}}

            <a id="state" href="{{ route('profiles.statement') }}"><div class="eos-group-title"><i class="fas fa-clipboard" aria-hidden="true"></i> My Statement</div></a>
            <a style="padding:0px;font-size: 14px;" href="{{ route('profiles.sponsor') }}"><div class="eos-group-title"><i class="fas fa-user-secret" aria-hidden="true"></i> My Sponsor</div></a>
            {{-- <a style="padding:0px;font-size: 14px;" href="{{ route('webmessage.index.user') }}"><div class="eos-group-title"><i class="fas fa-user-secret" aria-hidden="true"></i> Send Message</div></a> --}}
            <a style="padding:0px;font-size: 14px;" href="{{ route('profiles.oneten') }}">
                <div class="eos-group-title">
                <i aria-hidden="true">
                    <img src="{{asset('frontend/img/oneten.gif')}}" style="max-width: 22px;">
                </i> OneTen</div>
            </a>
            @endif
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

<nav class="navbar navbar-fixed-top" style="border-bottom-color:#fff" id="navtop">
    <div class="container-fluid">
        <div class="navbar-header">
        <!-- LEFT MODAL - NAV BAR -->
        @if (Auth::user())
        <a class="navbar-brand" href="#" onclick="if (!window.__cfRLUnblockHandlers) return false; openNav()" style="margin-right: -10px;">
            <span class="glyphicon glyphicon-menu-hamburger">
            </span>
        </a>
        @endif
        <a class="navbar-brand" href="{{ route('home') }}" style="width:230px;    padding: 9px 1px;">
            <img style="width:125px;margin-left: -2px;" src="frontend/img/logo.png" />
        </a>
        @if (Auth::user() == false)
        <div style="position:absolute;right:16px;color:#fff;top:7px;line-height: 6px;">
            <button href="" id="openregister" class="btn btn-success" style="background: #FFE71E;color:#000;">Register</button> <button class="btn btn-success" style="margin-left: 10px;background: #208E50" id="openlogin">Login</button>
        </div>
        @endif
        @if(Auth::user())
        <div style="position:absolute;right:16px;color:#fff;top:7px;line-height: 6px;">
            <div style="float: left;    margin-right: 6px;">
                <img src="frontend/img/withdraw.png" style="width:40px;margin-left: 8px;" data-toggle="modal" data-target="#passwordverify">
                <p style="font-size: 12px;">Withdraw</p>
            </div>
        </div>
        @endif
        </div>
    </div>
</nav>

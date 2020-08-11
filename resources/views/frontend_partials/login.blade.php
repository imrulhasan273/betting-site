<div id="loginnav" class="loginnav" style="display: none;">
    <a id="closenav" class="closebtn" style="float: right;
                                            font-size: 34px;
                                            margin-right: 10px;">×</a>
    <div class="">
    <p style="color: #FFE71E;position: absolute;
                top: 20px;
                left: 63px;
                font-size: 20px;">Login | ID</p>
    <div id="errorSignIn" class="alert" role="alert">
        <button type="button" class="close" data-dismiss="" aria-hidden="true">
        ×
        </button> <strong id="alertsignin"> </strong><span id="signuperrorText"></span>
    </div>
    <form method="POST" action="{{ route('login') }}" class="form-group">
    @csrf
        <div class="form-group" style="padding: 7px;margin-top: 60px;">
        <input type="text" name="email" id="user" placeholder="Email Id" class="form-control fojFwL" style="margin-bottom: 10px;" />
        <input type="password" name="password" id="password" placeholder="Password" class="form-control fojFwL" style="margin-bottom: 10px;" />
        <button type="submit" class="btn btn-primary form-control" style="background: #00cc44;color:#000" id="userSignInForm">
            {{ __('Login') }}
        </button>
    </div>
    </form>
    </div>
</div>

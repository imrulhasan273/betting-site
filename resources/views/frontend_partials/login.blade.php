<div id="loginnav" class="loginnav" style="display: none;">
    <a id="closenav" class="closebtn" style="float: right;font-size: 34px;margin-right: 10px;">×</a>
    <div class="">
    <p style="color: #4267B2;position: absolute; top: 20px;left: 63px;font-size: 20px;">Login | ID</p>
    <div id="errorSignIn" class="alert" role="alert">
        <button type="button" class="close" data-dismiss="" aria-hidden="true">
        ×
        </button> <strong id="alertsignin"> </strong><span id="signuperrorText"></span>
    </div>

    {{-- @if(session()->has('message'))
    <div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>{{ session()->get('message')}} </div>
    {{ session()->forget('message') }}
    @elseif(session()->has('error'))
    <div class="alert alert-danger">{{ session()->get('error')}} </div>
    @endif --}}

    {{-- @error('user_name')
        <div style="color:white" class="alert alert-danger">{{ $message }}</div>
    @enderror --}}


    {{-- <h2 id ="er" style="color:white"></h2> --}}

    {{-- @if(count($errors)>0)
        @foreach ($errors->all() as $error)
            <p style="color:white" class="alert alert-danger">{{ $error }}</p>
        @endforeach
    @endif --}}


    <form method="POST" action="{{ route('login') }}" class="form-group">
    @csrf
        <div class="form-group" style="padding: 7px;margin-top: 60px;">
        <input style="-webkit-text-fill-color: #050505;" type="text" name="user_name" id="username" placeholder="User Name" class="form-control fojFwL @error('user_name') is-invalid @enderror" style="margin-bottom: 10px;" required/>
        {{-- <input style="-webkit-text-fill-color: #050505;" type="text" name="email" id="user" placeholder="Email Id" class="form-control fojFwL @error('email') is-invalid @enderror" style="margin-bottom: 10px;" /> --}}
        <input style="-webkit-text-fill-color: #050505;" type="password" name="password" id="password" placeholder="Password" class="form-control fojFwL" style="margin-bottom: 10px;" required/>
        <button type="submit" class="btn btn-primary form-control" style="background: #4267B2;color:#000" id="">
            {{ __('Login') }}
        </button>

        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" type="submit" class="btn" style="color:rgb(12, 185, 238)">Forget Password</a>
        @endif

        {{-- <a data-toggle="modal" data-target="#forgetPassword" type="submit" class="btn" style="color:rgb(12, 185, 238)">Forget Password</a> --}}

        </div>
    </form>
    </div>
</div>


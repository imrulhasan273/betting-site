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
    <form method="POST" action="{{ route('register') }}" class="form-group">
        @csrf
        <div class="form-group" style="padding: 7px;margin-top: 60px;">
        <input type="text" name="name" id="name" placeholder="FULL NAME" class="form-control fojFwL" style="margin-bottom: 10px;" />
        {{-- <input type="text" name="userId" id="userId" placeholder="USER ID" class="form-control fojFwL" style="margin-bottom: 10px;" /> --}}

        {{-- <input type="number" name="mobileNumber" id="mobileNumber" placeholder="MOBILE NO" class="form-control fojFwL" style="margin-bottom: 10px;" /> --}}
        <input type="email" name="email" id="email" placeholder="EMAIL" class="form-control fojFwL" style="margin-bottom: 10px;" />

        <select name="club" class="form-control fojFwL" id="" name="club">
            <option value="">Select a Club</option>
            @foreach ($clubs ?? '' as $club)
            <option value="{{$club->id}}">{{$club->name}}</option>
            @endforeach
        </select>
        <br>

        <select name="sponsor" class="form-control fojFwL" id="" name="club">
            <option value="">Select a Sponsor</option>
            @foreach ($sponsors as $sponsor)
            <option value="{{$sponsor->id}}">{{$sponsor->name}}</option>
            @endforeach
        </select>
        <br>
        <input type="text" name="phone" id="phone" placeholder="Phone Number" class="form-control fojFwL" style="margin-bottom: 10px;" />
        {{-- <input type="text" name="sponsor_register" id="sponsor_register" placeholder="SPONSOR'S USERNAME" class="form-control fojFwL" style="margin-bottom: 10px;" /> --}}
        <input type="password" name="password" id="passwordsignup" placeholder="PASSWORD" class="form-control fojFwL" style="margin-bottom: 10px;" />
        <input type="password" name="password_confirmation" id="confirmPassword" placeholder="CONFIRM PASSWORD" class="form-control fojFwL" style="margin-bottom: 10px;" />
        <button type="submit" class="btn btn-success form-control" style="background: #10c510;color:#000" id="userSignUp">{{ __('Register') }}</button>
    </div>
    </form>
    </div>
</div>

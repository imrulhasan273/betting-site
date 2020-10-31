<div class="col-md-12" style="padding:0px;">
    <div class="_9fc75" style="min-height: 59px;">
      <div class="_293d1" style="width: auto;">
            {{-- <a class="_5fc2c _42580 dfe8d" href="{{route('home')}}">
                <div class="ae156"><img alt="One Ten" style="width: 27px;
                                                            margin-left: -3px;" src="frontend/img/coin.png"></div>
                <div class="_7ab16">Coin Flip</div>
            </a>

            <a class="_5fc2c _42580" href="{{route('profiles.oneten')}}">
                <div class="ae156"><img alt="One Ten" style="width: 27px;
                                                            margin-left: -3px;" src="frontend/img/oneten.gif"></div>
                <div class="_7ab16">One Ten</div>
            </a> --}}


            <a class="_5fc2c _42580 text-center" href="#">
                <div class="ae156"><span style="color: #fff" id="MyClockDisplayx" onload="showTimex()"></span></div>

            </a>

            @if (Auth::user())
            <a data-toggle="modal" data-target="#deposit" class="btn" type="button"><img style="width:25px;" src="frontend/img/deposit.png">
                <div class="efb59">Deposit</div>
            </a>
            @endif

            <a class="_5fc2c _42580" href="{{route('mybet')}}">
                <div class="ae156"><svg version="1.1" width="14" height="100%" id="my-bets" x="0" y="0" viewBox="0 0 24 32" xml:space="preserve">
                    <path fill="#FFF" d="M0 0v32h24V0H0zm20 28H4v-6h16v6z"></path>
                    </svg></div>
                <div class="_7ab16">My bets</div>
            </a>

            <button data-toggle="modal" data-target="#notice" class="_5c053" type="button"><img style="width:25px;" src="frontend/img/bell.png">
                <div class="efb59">Notice</div>
            </button>
        </div>
    </div>
  </div>
 <script type="text/javascript">
                function showTimex() {
                    var date = new Date();
                    var h = date.getHours(); // 0 - 23
                    var m = date.getMinutes(); // 0 - 59
                    var s = date.getSeconds(); // 0 - 59
                    var session = "AM";

                    if (h == 0) {
                        h = 12;
                    }
                    if (h > 12) {
                        h = h - 12;
                        session = "PM";
                    }
                    h = (h < 10) ? "0" + h : h;
                    m = (m < 10) ? "0" + m : m;
                    s = (s < 10) ? "0" + s : s;

                    var time = h + ":" + m + ":" + s + "" + session;
                    var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                    var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                    var curWeekDay = days[date.getDay()];
                    var curDay = date.getDate();
                    var curMonth = months[date.getMonth()];
                    var curYear = date.getFullYear();
                    var today = curWeekDay + " " + curDay + " " + curMonth + " ";
                    document.getElementById("MyClockDisplayx").innerText = today + "" + time;
                    document.getElementById("MyClockDisplayx").textContent = time;
                    setTimeout(showTimex, 1000);
                }
                showTimex();
            </script>


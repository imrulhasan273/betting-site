@extends('layouts.frontend')
@section('content')
 <!--  START CONTENT -->
 <div style="max-width: 400px;margin: 0 auto;background: #147B45;min-height: 321px;overflow: hidden;padding-top: 56px;">
    <div style="width: 100%;
                background: #0b5a31;
                height: 291px;">
        <h1 style="color: #fff;text-align: center;font-size: 34px;"><span style="color: #E5A80D">One</span><span style="color: #FE7118;">Ten</span> Online Game</h1>

        <h1 style="color: #fff;text-align: center;margin-top: 12px;">Select any Number for Game: #00</h1>
        <div style="margin-top: 12px;max-width: 358px;
                    margin: 0 auto;">
            <p class="text-center">
            </p>
        </div>
        <h1 style="color: #fff;text-align: center;margin-top: 12px;">Bet Limit is 50 to 10,000. Draw in Every Day</h1>
        <div style="width:100%;margin-top:22px;">
            <div style="width:33%;background: #E5A80E;color:#fff;padding:7px;margin:0 auto">
                <p>Draw: </p>
            </div>
        </div>
    </div>

    <div style="width:100%;    padding-top: 35px;">
        <h1 style="text-align: center;color:#fff;"><span style="color: yellow">OneTen:</span> Draw #0043 on 13 Jul 2020 2:42 PM</h1>
        <div style="width: 150px;
                    margin: 0 auto;
                    text-align: center;
                    margin-top: 12px;
                    background: #fff;
                    padding: 4px;
                    border-radius: 19px;
                    font-weight: bold;color:red"><span id="MyClockDisplayx" onload="showTimex()">09:04:39AM</span>
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
        </div>

        <div style="width: 189px;
                    margin: 0 auto;
                    text-align: center;
                    margin-top: 12px;
                    background: #E5A80E;
                    font-weight: bold;
                    padding: 6px;
                    color: #fff;
                    border-radius: 9px;">
            <h1 style="font-size: 22px;">Win Number: 10</h1>
            <p>Draw ID: #0043</p>
            <p>2X</p>
        </div>
        <div style="width: 189px;
                    margin: 0 auto;
                    text-align: center;
                    margin-top: 12px;
                    background: #E5A80E;
                    font-weight: bold;
                    padding: 6px;
                    color: #fff;
                    border-radius: 9px;">
            <h1 style="font-size: 22px;">Win Number: 2</h1>
            <p>Draw ID: #0043</p>
            <p>3X</p>
        </div>
        <div style="width: 189px;
                    margin: 0 auto;
                    text-align: center;
                    margin-top: 12px;
                    background: #E5A80E;
                    font-weight: bold;
                    padding: 6px;
                    color: #fff;
                    border-radius: 9px;">
            <h1 style="font-size: 22px;">Win Number: 5</h1>
            <p>Draw ID: #0043</p>
            <p>2.5X</p>
        </div>
    </div>
</div>
<!--  END CONTENT-->
@endsection

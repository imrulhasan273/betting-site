<footer class="footer-basic-centered " style="background: #4267B2">
    <div class="">
      <div class="row">

        <div style="text-align: center" class="col-md-6">
          <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-9">
              <p class="footer-links">
                <a href="{{route('home')}}" id="footerlink">Home</a>
                {{-- <a href="{{route('webmessage.index.user')}}" id="footerlink"> Contact-us</a> --}}
                <a href="{{route('rules')}}" id="footerlink"> Rules & Regulations</a>
                <a href="{{ route('faq') }}" id="footerlink"> FAQ</a>
                <a href="{{route('about')}}" id="footerlink"> About Us</a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
        </div>
        <div class="col-md-3">
          <hr>
            @php
            $warnings = DB::table('settings')
                ->where('id', '=', 1)
                ->pluck('warning');
                $warning = $warnings[0] ?? null;
            @endphp
          <span class="userAlert text-center" style="color: #fff"> {{ $warning }} </span>
          <hr>
        </div>
      </div>
    </div>

  </footer>
  @php
  $footers = DB::table('settings')
      ->where('id', '=', 1)
      ->pluck('footer');
    $footer = $footers[0] ?? null;
  @endphp
  <div class="col-md-12" style="padding: 0px;">
  <p class="text-center" style="background: black; padding: 12px 0px;color: #fff;">&copy; {{ $footer }}  || Server Time:
<span id="MyClockDisplayx" onload="showTimex()"></span>
</p>
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


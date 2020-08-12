<footer class="footer-basic-centered " style="background: #147B45">
    <div class="">
      <div class="row">
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-9">
              <p class="footer-links">
                <a href="{{route('home')}}" id="footerlink">Home</a>
                <a href="{{route('support')}}" id="footerlink"> Contact-us</a>
                <a href="{{route('rules')}}" id="footerlink"> Rules & Regulations</a>
                <a href="#" id="footerlink"> FAQ</a>
                <a href="{{route('about')}}" id="footerlink"> About Us</a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
        </div>
        <div class="col-md-3">
          <hr>
          <span class="userAlert text-center" style="color: #f3bcab"> We don't allow anyone under 18 years to bet on this site and also site administrator is not liable for any kind of issues created by user.</span>
          <hr>
        </div>
      </div>
    </div>

  </footer>
  @php
  $footer = DB::table('settings')
      ->where('id', '=', 1)
      ->pluck('footer');
  @endphp
  <div class="col-md-12" style="padding: 0px;">
  <p class="text-center" style="background: #FF7118; padding: 12px 0px;color: #fff;">&copy; {{ $footer[0] }}</p>
  </div>

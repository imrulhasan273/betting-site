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
  <p class="text-center" style="background: black; padding: 12px 0px;color: #fff;">&copy; {{ $footer }}
</p>
  </div>

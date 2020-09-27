 @php
  $notice_slide = DB::table('notices')
      ->where('id', '=', 1)
      ->pluck('notice_slide');
    $notice_slide = $notice_slide[0] ?? null;
  @endphp
<div style="width:100%;background: #4267B2
;height:22px;margin-top: -17px;">
    <span style="width: 12%;
                float: left;
                background: #4267B2;
                border-radius: 0px 15px 15px 0px;color:#fff;">News</span>
    <marquee style="background: #4267B2
;width:88%;float:left;color:#fff;" class="mrq" scrollamount='3' direction="scroll">
    <p>{{$notice_slide}}</p>
    </marquee>
  </div>

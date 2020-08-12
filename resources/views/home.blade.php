@extends('layouts.frontend')
@section('content')
<!-- START CONTENT UPPER SECION -->
<div class="row" style="background: #E8E8E8;margin-left: 0px;margin-right: 0px;margin-top: 52px;">
    <!-- Start Header Section -->
    <div class="col-md-12" style="padding:0px;">
      <div class="_9fc75" style="min-height: 59px;">
        <div class="_293d1" style="width: auto;">
            <a class="_5fc2c _42580 dfe8d" href="{{route('home')}}">
            <div class="ae156"><img alt="One Ten" style="width: 27px;
                                                        margin-left: -3px;" src="frontend/img/coin.png"></div>
            <div class="_7ab16">Coin Flip</div>
          </a>
          <a class="_5fc2c _42580" href="{{route('profiles.oneten')}}">
            <div class="ae156"><img alt="One Ten" style="width: 27px;
                                                        margin-left: -3px;" src="frontend/img/oneten.gif"></div>
            <div class="_7ab16">One Ten</div>
          </a>
          <a class="_5fc2c _42580" data-toggle="modal" onclick="openlogin()">
            <div class="ae156"><img style="width:25px;" src="frontend/img/deposit.png"></div>
            <div class="_7ab16">Deposit</div>
          </a>
          <a class="_5fc2c _42580" href="{{route('mybet')}}">
            <div class="ae156"><svg version="1.1" width="14" height="100%" id="my-bets" x="0" y="0" viewBox="0 0 24 32" xml:space="preserve">
                <path fill="#FFF" d="M0 0v32h24V0H0zm20 28H4v-6h16v6z"></path>
              </svg></div>
            <div class="_7ab16">My bets</div>
          </a><button data-toggle="modal" data-target="#notice" class="_5c053" type="button"><img style="width:25px;" src="frontend/img/bell.png">
            <div class="efb59">Notice</div>
          </button></div>
      </div>
    </div>
    <!-- End Header Section -->
    <!--START HEADELINE -->
    <div style="width:100%;background: #E56516;height:22px;margin-top: -17px;">
      <span style="width: 12%;
                  float: left;
                  background: #E5A80E;
                  border-radius: 0px 15px 15px 0px;color:#fff;">News</span>
      <marquee style="background: #E56516;width:88%;float:left;color:#fff;" class="mrq" scrollamount='3' direction="scroll">
        <p>Welcome To BdBet10.Com সুখবর !&nbsp;২৪ ঘন্টা Withdraw পেতে আমাদের সাথে থাকুন -Limit (&nbsp;500 To 5,000 )Tk আমাদের&nbsp;সাথে থাকার জন্য ধন্যবাদ💚</p>
      </marquee>
    </div>
    <!--END HEADELINE -->
    <!--START MATCH OPTION -->
    <div class="col-md-12" style="padding:0px;">
      <div>
        <div class="fe902">
          <div class="c1950">
            <ul data-test-name="quickAccess" class="_847a8 d9f21">
              <li class="a7170"><a href="#tab2" data-toggle="tab">
                  <div class="_8faff"><img alt="Football" src="frontend/img/f_ball.png"></div>
                  <div class="dfbb8">Football</div>
                </a>
              </li>
              <li class="a7170"><a href="#tab3" data-toggle="tab">
                  <div class="_8faff"><img alt="Cricket" src="frontend/img/c_ball.png"></div>
                  <div class="dfbb8">Cricket</div>
                </a>
              </li>
              <li class="a7170"><a href="#tab4" data-toggle="tab">
                  <div class="_8faff">
                    <div class="fd0c8 _7c452"><svg class="_1552c" version="1.1" id="basketball" x="0" y="0" viewBox="0 0 32 32" xml:space="preserve">
                        <path d="M12.1 9a22.4 22.4 0 0117.8 14.9 16 16 0 01-6 6c-3.2-.3-5-2.1-5.7-6-1.5-7.5-6.3-8.7-9.2-8.7.2-2.2.9-4.3 1.8-6.3h1.3m-4.5 7.8C5.4 17 4 18 3.1 19.3c-1.2 2-.7 4.5-.3 5.7a16 16 0 009.6 6.5c-3-3.7-4.7-8.6-4.7-13.9v-.9M10 7.5l2-3.2c-1.8-.7-2.4-2-2.4-3.1-4 1.6-7 4.7-8.6 8.6 2.5-1.5 5.3-2.3 8.4-2.3h.6m-2.4 7.8a22 22 0 011.8-6.5c-3.5 0-6.6 1-9 3a15.4 15.4 0 00.6 10c0-1.1.2-2.2.8-3.2 1-1.8 3-2.9 5.8-3.3m5.4-12.1C14.2 2 15.3 1 16.6 0h-.8c-3.1 0-5 .8-5 .8.2.2 0 1.8 2.3 2.4M29 6.6c-3-3.7-7.9-1.8-7.9-1.8-1.3.4-3.7.4-7.3-.2-.9 1-1.5 2-2.1 3h.8a23.3 23.3 0 0118.3 14.5c.8-1.9 1.3-4 1.3-6.3 0-3.3-1.2-6.5-3.1-9.2m-8.5-3c1.1-.5 3-1 5-.5-1.8-1.5-4.1-2.5-6.6-3-1.5 1-2.8 2-4.1 3.3 3.5.7 5 .5 5.7.2M17 24.3c-1.3-6.6-5.4-7.7-8.1-7.7v1.1c0 5.5 2 10.6 5.4 14.2l1.7.1a16 16 0 006-1.1c-2.7-1-4.4-3.1-5-6.6"></path>
                      </svg></div>
                  </div>
                  <div class="dfbb8">Basketball</div>
                </a>
              </li>
              <li class="a7170"><a href="#tab6" data-toggle="tab">
                  <div class="_8faff">
                    <div class="fd0c8 _7c452"><svg class="_1552c" version="1.1" id="tennis" x="0" y="0" viewBox="0 0 32 32" xml:space="preserve">
                        <path d="M16.3.7V0c4 0 8 1.6 11 4.7 3.1 3 4.6 7 4.7 11h-.7c-2.5 0-4.9 1-6.7 2.8l-2.9 2.8a7.6 7.6 0 01-5.5 2.3c-2 0-4-.8-5.5-2.3a7.7 7.7 0 010-11l2.9-2.8A9.8 9.8 0 0016.3.7zm9.5 19l-2.9 2.9c-1.8 1.8-4.2 2.8-6.7 2.8s-5-1-6.7-2.8-2.8-4.2-2.8-6.7 1-5 2.8-6.8l2.9-2.7A7.7 7.7 0 0014.7.9V.2a16 16 0 1017.2 17.2h-.6c-2.1 0-4 .8-5.5 2.3z"></path>
                      </svg></div>
                  </div>
                  <div class="dfbb8">Tennis</div>
                </a>
              </li>
              <li class="a7170"><a href="#tab15" data-toggle="tab">
                  <div class="_8faff">
                    <div class="fd0c8 _7c452"><img alt="Football" style="width: 32px;height:33px;" src="frontend/img/table_tenis.png"></div>
                  </div>
                  <div class="dfbb8">Table Tennis</div>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!--END MATCH OPTION -->
</div>
<!--END CONTENT UPPER SECION -->

<!-- START CONTENT -->
<div class="tab-content" id="content" style="margin-top: -113px;">
    <div class="tab-content" id="content" style="margin-top: -113px;">

      <!-------Start cricket tab===================================================================--->
      <div id="tab3" class="tab-pane fade">
        <!-- live section -->
        <div style="margin-top: 111px;">
          <div class="live">
            <!--<img src="frontend/img/live.gif"> -->
            <span class="live_text" style="color:yellow">LIVE MATCHES</span>
          </div>
          <div class="" style="border: 1px solid #bfc5cc;">
            <div class="" data-toggle="collapse" data-parent="#accordion" href="#tab33419" style="background:#147B45;padding: 12px 7px;min-height:54px;">
              <span class="gameicon"><img src="frontend/img/ka-pl.png" width="27px;"></span>
              <h3 class="panel-title ">
                USG Chemnitz <span style="color:#ff0">vs</span> Berlin Eagles CC, ECS Dresden T10 2020 || 10 Aug 2020 03:00 pm
              </h3>
            </div>
            <div id="tab33419" class="panel-collapse collapse in">
              <div id="3419" class="panel-collapse collapse in">
                <div class="que" style="">
                  <div class="collapse_2nd" style="">
                    <div class="qtitle" data-toggle="collapse" data-parent="#accordion" href="#q323845" style="">
                      <h4 class="panel-title qtitletext">
                        To Win The Match<span class="" style="margin-left: 5px;color:#ff3b30!important;font-size:.7em;"><i> LIVE</i></span>
                      </h4>
                    </div>
                    <div id="q323845" class="panel-collapse">
                      <div class="container-fluid">
                        <div class="row" style="background: #5F5F5F">
                          <div class="col-md-3 col-xs-6 ans" style="margin-top: 0px;border:1px solid #777A7D;">
                            <div class="data-show" data-toggle="modal" data-target="#betting" style="" id="select " bettingtitle="3419" bettingsubtitle=" 23845" bettingsubtitleoption="55934" gametype="2" gamestatus="1">
                              <div class="" align="center" style="color:#fff;background:#5F5F5F;">
                                Chemnitz<span class="" text-align="center" style="color:#F9CD51;">
                                  1.51
                                </span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 col-xs-6 ans" style="margin-top: 0px;border:1px solid #777A7D;">
                            <div class="data-show" data-toggle="modal" data-target="#betting" style="" id="select " bettingtitle="3419" bettingsubtitle=" 23845" bettingsubtitleoption="55935" gametype="2" gamestatus="1">
                              <div class="" align="center" style="color:#fff;background:#5F5F5F;">
                                Berlin Eagles <span class="" align="center" style="color:#F9CD51;">
                                  2.20
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="3419" class="panel-collapse collapse in">
                <div class="que" style="">
                  <div class="collapse_2nd" style="">
                    <div class="qtitle" data-toggle="collapse" data-parent="#accordion" href="#q323905" style="">
                      <h4 class="panel-title qtitletext">
                        1st Ball[1st Batting]<span class="" style="margin-left: 5px;color:#ff3b30!important;font-size:.7em;"><i> LIVE</i></span>
                      </h4>
                    </div>
                    <div id="q323905" class="panel-collapse">
                      <div class="container-fluid">
                        <div class="row" style="background: #5F5F5F">
                          <div class="col-md-3 col-xs-6 ans" style="margin-top: 0px;border:1px solid #777A7D;">
                            <div class="data-show" data-toggle="modal" data-target="#betting" style="" id="select " bettingtitle="3419" bettingsubtitle=" 23905" bettingsubtitleoption="55948" gametype="2" gamestatus="1">
                              <div class="" align="center" style="color:#fff;background:#5F5F5F;">
                                0 Run<span class="" align="center" style="color:#F9CD51;">
                                  1.45
                                </span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 col-xs-6 ans" style="margin-top: 0px;border:1px solid #777A7D;">
                            <div class="data-show" data-toggle="modal" data-target="#betting" style="" id="select " bettingtitle="3419" bettingsubtitle=" 23905" bettingsubtitleoption="55949" gametype="2" gamestatus="1">
                              <div class="" align="center" style="color:#fff;background:#5F5F5F;">
                                1 Run<span class="" align="center" style="color:#F9CD51;">
                                  2.10
                                </span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 col-xs-6 ans" style="margin-top: 0px;border:1px solid #777A7D;">
                            <div class="data-show" data-toggle="modal" data-target="#betting" style="" id="select " bettingtitle="3419" bettingsubtitle=" 23905" bettingsubtitleoption="55950" gametype="2" gamestatus="1">
                              <div class="" align="center" style="color:#fff;background:#5F5F5F;">
                                2 Run<span class="" align="center" style="color:#F9CD51;">
                                  10.00
                                </span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 col-xs-6 ans" style="margin-top: 0px;border:1px solid #777A7D;">
                            <div class="data-show" data-toggle="modal" data-target="#betting" style="" id="select " bettingtitle="3419" bettingsubtitle=" 23905" bettingsubtitleoption="55951" gametype="2" gamestatus="1">
                              <div class="" align="center" style="color:#fff;background:#5F5F5F;">
                                3 Run<span class="" align="center" style="color:#F9CD51;">
                                  45.00
                                </span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 col-xs-6 ans" style="margin-top: 0px;border:1px solid #777A7D;">
                            <div class="data-show" data-toggle="modal" data-target="#betting" style="" id="select " bettingtitle="3419" bettingsubtitle=" 23905" bettingsubtitleoption="55952" gametype="2" gamestatus="1">
                              <div class="" align="center" style="color:#fff;background:#5F5F5F;">
                                4 Run<span class="" align="center" style="color:#F9CD51;">
                                  6.00
                                </span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 col-xs-6 ans" style="margin-top: 0px;border:1px solid #777A7D;">
                            <div class="data-show" data-toggle="modal" data-target="#betting" style="" id="select " bettingtitle="3419" bettingsubtitle=" 23905" bettingsubtitleoption="55953" gametype="2" gamestatus="1">
                              <div class="" align="center" style="color:#fff;background:#5F5F5F;">
                                6 Run<span class="" align="center" style="color:#F9CD51;">
                                  15.00
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- live section  end-->
        <div>
          <div class="live">
            <!-- <img src="frontend/img/gogf.gif"> -->
            <span class="live_text" style="color:yellow">UPCOMING MATCHES</span>
          </div>
          <div class="" style="border: 1px solid #bfc5cc;">
            <div class="" data-toggle="collapse" data-parent="#accordion" href="#tab3up3423" style="padding: 12px 7px;min-height:54px;min-height:54px;background: #147b45">
              <span class="gameicon"><img src="frontend/img/ka-pl.png" width="27px;"></span>
              <h3 class="panel-title">
                Berlin Eagles CC <span style="color:#ff0">vs</span> USG Chemnitz, ECS Dresden T10 2020 || 10 Aug 2020 07:00 pm
              </h3>
            </div>
            <div id="tab3up3423" class="panel-collapse collapse out">
              <div class="que" style="">
                <div class="collapse_2nd" style="">
                  <div class="qtitle" data-toggle="collapse" data-parent="#accordion" href="#q3up23923" style="">
                    <h4 class="panel-title qtitletext">
                      1st ball Run - 1st batting<span style="margin-left: 5px;color:#37b000!important;font-size:.7em;"><i> UPCOMING</i></span>
                    </h4>
                  </div>
                  <div id="q3up23923" class="panel-collapse collapse ">
                    <div class="container-fluid">
                      <div class="row" style="background: #5F5F5F">
                        <div class="col-md-3 col-xs-6 ans" style="margin-top: 0px;border:1px solid #777A7D;">
                          <div class="data-show" data-toggle="modal" data-target="#betting" style="" id="select " bettingtitle="3423" bettingsubtitle=" 23923" bettingsubtitleoption="56003" gametype="2" gamestatus="2">
                            <div class="" align="center" style="color:#fff;background:#5F5F5F;">
                              Dot Ball<span class="" align="center" style="color:#F9CD51;">
                                1.45
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-xs-6 ans" style="margin-top: 0px;border:1px solid #777A7D;">
                          <div class="data-show" data-toggle="modal" data-target="#betting" style="" id="select " bettingtitle="3423" bettingsubtitle=" 23923" bettingsubtitleoption="56004" gametype="2" gamestatus="2">
                            <div class="" align="center" style="color:#fff;background:#5F5F5F;">
                              1 Run<span class="" align="center" style="color:#F9CD51;">
                                2.20
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-xs-6 ans" style="margin-top: 0px;border:1px solid #777A7D;">
                          <div class="data-show" data-toggle="modal" data-target="#betting" style="" id="select " bettingtitle="3423" bettingsubtitle=" 23923" bettingsubtitleoption="56005" gametype="2" gamestatus="2">
                            <div class="" align="center" style="color:#fff;background:#5F5F5F;">
                              2 Run<span class="" align="center" style="color:#F9CD51;">
                                10.00
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-xs-6 ans" style="margin-top: 0px;border:1px solid #777A7D;">
                          <div class="data-show" data-toggle="modal" data-target="#betting" style="" id="select " bettingtitle="3423" bettingsubtitle=" 23923" bettingsubtitleoption="56006" gametype="2" gamestatus="2">
                            <div class="" align="center" style="color:#fff;background:#5F5F5F;">
                              3 Run<span class="" align="center" style="color:#F9CD51;">
                                30.00
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-xs-6 ans" style="margin-top: 0px;border:1px solid #777A7D;">
                          <div class="data-show" data-toggle="modal" data-target="#betting" style="" id="select " bettingtitle="3423" bettingsubtitle=" 23923" bettingsubtitleoption="56007" gametype="2" gamestatus="2">
                            <div class="" align="center" style="color:#fff;background:#5F5F5F;">
                              4 Run<span class="" align="center" style="color:#F9CD51;">
                                4.00
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-xs-6 ans" style="margin-top: 0px;border:1px solid #777A7D;">

                          <div class="data-show" data-toggle="modal" data-target="#betting" style="" id="select " bettingtitle="3423" bettingsubtitle=" 23923" bettingsubtitleoption="56008" gametype="2" gamestatus="2">
                            <div class="" align="center" style="color:#fff;background:#5F5F5F;">
                              6 Run<span class="" align="center" style="color:#F9CD51;">
                                15.00
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-------End cricket tab===================================================================--->



      <!---------Start Basketball tab==============================================--->
      <div id="tab4" class="tab-pane fade">
        <!-- live section -->
        <div style="margin-top: 111px;">
          <div class="live">
            <!--<img src="frontend/img/live.gif"> -->
            <span class="live_text" style="color:yellow">LIVE MATCHES</span>
          </div>
        </div>
        <!-- live section  end-->
        <div>
          <div class="live">
            <!-- <img src="frontend/img/gogf.gif"> -->
            <span class="live_text" style="color:yellow">UPCOMING MATCHES</span>
          </div>
        </div>
      </div>
      <!---------End Basketball tab==============================================--->


      <!--Start Badminton tab=================================================-->
      <div id="tab5" class="tab-pane fade">
        <!-- live section -->
        <div style="margin-top: 111px;">
          <div class="live">
            <!--<img src="frontend/img/live.gif"> -->
            <span class="live_text" style="color:yellow">LIVE MATCHES</span>
          </div>
        </div>
        <!-- live section  end-->
        <div>
          <div class="live">
            <!-- <img src="frontend/img/gogf.gif"> -->
            <span class="live_text" style="color:yellow">UPCOMING MATCHES</span>
          </div>
        </div>
      </div>
      <!-- End Badminton tab=================================================-->


      <!--Start football-->
      <div id="tab2" class="tab-pane fade active in">
        <!-- live section -->
        <div style="margin-top: 111px;">
          <div class="live">
            <!--<img src="frontend/img/live.gif"> -->
            <span class="live_text" style="color:yellow">LIVE MATCHES</span>
          </div>
          <div class="" style="border: 1px solid #bfc5cc;">
            <div class="" data-toggle="collapse" data-parent="#accordion" href="#tab23397" style="background:#147B45;padding: 12px 7px;min-height:54px;" aria-expanded="true">
              <span class="gameicon"><img src="frontend/img/1393757333.png" width="27px;"></span>
              <h3 class="panel-title">
                Brisbane <span style="color:#ff0">vs</span> Sydney FC , Australia A League || 10 Aug 2020 03:30 pm
              </h3>
            </div>
            <div id="tab23397" class="panel-collapse collapse in" aria-expanded="true" style="">
              <div id="3397" class="panel-collapse collapse in">
                <div class="que" style="">
                  <div class="collapse_2nd" style="">
                    <div class="qtitle" data-toggle="collapse" data-parent="#accordion" href="#q223661" style="">
                      <h4 class="panel-title qtitletext">
                        Full Time Result<span style="margin-left: 5px;color:#ff3b30!important;font-size:.7em;"><i> LIVE</i></span>
                      </h4>
                    </div>
                    <div id="q223661" class="panel-collapse ">
                      <div class="container-fluid">
                        <div class="row" style="background: #5F5F5F">
                          <div class="col-md-3 col-xs-6 ans" style="margin-top: 0px;border:1px solid #777A7D;">
                            <div class="data-show" data-toggle="modal" data-target="#betting" style="" id="select " bettingtitle="3397" bettingsubtitle=" 23661" bettingsubtitleoption="55431" gametype="1" gamestatus="1">
                              <div class="" align="center" style="color:#fff;background:#5F5F5F;">
                                Brisbane <span class="" align="center" style="color:#F9CD51;">
                                  2.50
                                </span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 col-xs-6 ans" style="margin-top: 0px;border:1px solid #777A7D;">
                            <div class="data-show" data-toggle="modal" data-target="#betting" style="" id="select " bettingtitle="3397" bettingsubtitle=" 23661" bettingsubtitleoption="55432" gametype="1" gamestatus="1">
                              <div class="" align="center" style="color:#fff;background:#5F5F5F;">
                                Draw<span class="" align="center" style="color:#F9CD51;">
                                  3.50
                                </span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 col-xs-6 ans" style="margin-top: 0px;border:1px solid #777A7D;">
                            <div class="data-show" data-toggle="modal" data-target="#betting" style="" id="select " bettingtitle="3397" bettingsubtitle=" 23661" bettingsubtitleoption="55433" gametype="1" gamestatus="1">
                              <div class="" align="center" style="color:#fff;background:#5F5F5F;">
                                Sydney FC <span class="" align="center" style="color:#F9CD51;">
                                  2.05
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- live section  end-->
        <div>
          <div class="live">
            <!-- <img src="frontend/img/gogf.gif"> -->
            <span class="live_text" style="color:yellow">UPCOMING MATCHES</span>
          </div>
          <div class="" style="border: 1px solid #bfc5cc;">
            <div class="" data-toggle="collapse" data-parent="#accordion" href="#tab2up3425" style="background: #147B45;padding: 12px 7px;min-height:54px;background: #147b45">
              <span class="gameicon"><img src="frontend/img/1393757333.png" width="27px;"></span>
              <h3 class="panel-title">
                Ural <span style="color:#ff0">vs</span> Dinamo Moscow, Russia Premier League || 10 Aug 2020 08:00 pm
              </h3>
            </div>
            <div id="tab2up3425" class="panel-collapse collapse out">
              <div class="que" style="">
                <div class="collapse_2nd" style="">
                  <div class="qtitle" data-toggle="collapse" data-parent="#accordion" href="#upq223850" style="">
                    <h4 class="panel-title qtitletext">
                      Full Time Result<span style="margin-left: 5px;color:#37b000!important;font-size:.7em;"><i> UPCOMING</i></span>
                    </h4>
                  </div>
                  <div id="upq223850" class="panel-collapse collapse ">
                    <div class="container-fluid">
                      <div class="row" style="background: #5F5F5F">
                        <div class="col-md-3 col-xs-6 ans" style="margin-top: 0px;border:1px solid #777A7D;">
                          <div class="data-show" data-toggle="modal" data-target="#betting" style="" id="select " bettingtitle="3425" bettingsubtitle=" 23850" bettingsubtitleoption="55808" gametype="1" gamestatus="2">
                            <div class="" align="center" style="color:#fff;background:#5F5F5F;">
                              Ural <span class="" align="center" style="color:#F9CD51;">
                                3.00
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-xs-6 ans" style="margin-top: 0px;border:1px solid #777A7D;">
                          <div class="data-show" data-toggle="modal" data-target="#betting" style="" id="select " bettingtitle="3425" bettingsubtitle=" 23850" bettingsubtitleoption="55809" gametype="1" gamestatus="2">
                            <div class="" align="center" style="color:#fff;background:#5F5F5F;">
                              Draw<span class="" align="center" style="color:#F9CD51;">
                                2.45
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-xs-6 ans" style="margin-top: 0px;border:1px solid #777A7D;">
                          <div class="data-show" data-toggle="modal" data-target="#betting" style="" id="select " bettingtitle="3425" bettingsubtitle=" 23850" bettingsubtitleoption="55810" gametype="1" gamestatus="2">
                            <div class="" align="center" style="color:#fff;background:#5F5F5F;">
                              Dinamo Moscow<span class="" align="center" style="color:#F9CD51;">
                                1.80
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--End football-->

      <!-------Start tenis tab--------------------------------------------->
      <div id="tab6" class="tab-pane fade">
        <!-- live section -->
        <div style="margin-top: 111px;">
          <div class="live">
            <!--<img src="frontend/img/live.gif"> -->
            <span class="live_text" style="color:yellow">LIVE MATCHES</span>
          </div>
        </div>
        <!-- live section  end-->
        <div>
          <div class="live">
            <!-- <img src="frontend/img/gogf.gif"> -->
            <span class="live_text" style="color:yellow">UPCOMING MATCHES</span>
          </div>
        </div>
      </div>
      <!-------End tenis tab--------------------------------------------->


      <!-------Start table tenis tab--------------------------------------------->
      <div id="tab15" class="tab-pane fade">
        <!-- live section -->
        <div style="margin-top: 111px;">
          <div class="live">
            <!--<img src="frontend/img/live.gif"> -->
            <span class="live_text" style="color:yellow">LIVE MATCHES</span>
          </div>
        </div>
        <!-- live section  end-->
        <div>
          <div class="live">
            <!-- <img src="frontend/img/gogf.gif"> -->
            <span class="live_text" style="color:yellow">UPCOMING MATCHES</span>
          </div>
        </div>
      </div>
      <!-------End table tenis tab--------------------------------------------->

    </div>
    <meta name="csrf-tokens" content="85TZ3WjNSpmgIR3wHYSs0Cr5NdQRIGbWaxuojkDC">

    <script>
      $(document).ready(function() {
        $("#content").load('content');
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-tokens"]').attr('content')
          }
        });
        setInterval(function() {
          $.ajax({
            method: "POST",
            url: 'refresh',
            data: {
              wAmount: '1'
            },
            success: function(data) {

              //alert(data);
              if (data === "1") {
                $("#content").load('content');

              }
            }
          });
        }, 4000);
        //  setInterval(function () {
        //          $.ajax({
        //         method: "POST",
        //         url:'hidestop',
        //         data: {
        //             wAmount:'1'
        //         },
        //         success: function (data) {
        // //console.log(data);
        // //alert(data);
        //          //  alert(data);

        //             }

        //     });

        // },20000);
      });
    </script>

</div>
<!-- END CONTENT -->
@endsection

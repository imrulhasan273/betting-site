<div id="tab3" class="tab-pane fade">


    <!-- =====================START LIVE SECTION================================ -->

    <div style="margin-top: 111px;">
      <div class="live" data-toggle="collapse" href="#tab3collapse" data-parent="#accordion">
        <span class="live_text" style="color:yellow">LIVE MATCHES </span>
        <span style="float: right;color: #fff;">4 Matches</span>
      </div>

    <!-- START GAME LOOP -->
    @php
        $gameCount=1;
        $quesCount=1;
    @endphp

    @foreach ($games as $game)
    @if ($game->type->name == 'cricket' && $game->status=='live')
    @php
        $gameCount++;
    @endphp
      <div class="panel-collapse collapse in" id="tab3collapse">
        <div class="" data-toggle="collapse" data-parent="#accordion" href="#tab33419{{$gameCount}}" style="background:#147B45;padding: 12px 7px;min-height:54px;">
          <span class="gameicon"><img src="frontend/img/ka-pl.png" width="27px;"></span>
          <h3 class="panel-title ">
            {{ $game->name }}, {{ $game->tournament }} || {{ $game->date }} || {{ $game->time }}
          </h3>
        </div>
        <div id="tab33419{{$gameCount}}" class="panel-collapse collapse in">
          <div id="3419" class="panel-collapse collapse in">
            <div class="que" style="">
              <div class="collapse_2nd" style="">

                <!-- START QUESTION LOOP -->
                @foreach ($questions as $question)
                @if ($game->id == $question->game_id)
                @php
                    $quesCount++
                @endphp

                <div class="qtitle" data-toggle="collapse" data-parent="#accordion" href="#q323845{{$quesCount}}" style="">
                  <h4 class="panel-title qtitletext">
                    {{$question->question}}<span class="" style="margin-left: 5px;color:#ff3b30!important;font-size:.7em;"><i> LIVE</i></span>
                  </h4>
                </div>
                <div id="q323845{{$quesCount}}" class="panel-collapse">
                  <div class="container-fluid">
                    <div class="row" style="background: #5F5F5F">

                    <!-- ANSWER LOOP -->
                    @foreach ($answers as $answer)
                    @if ($question->id == $answer->question_id)

                      <div class="col-md-3 col-xs-6 ans" style="margin-top: 0px;border:1px solid #777A7D;">
                        <div class="data-show" data-toggle="modal" data-target="#betting" style="" id="select " bettingtitle="3419" bettingsubtitle=" 23845" bettingsubtitleoption="55934" gametype="2" gamestatus="1">
                          <div class="" align="center" style="color:#fff;background:#5F5F5F;">
                            {{$answer->answer}}<span class="" text-align="center" style="color:#F9CD51;">
                              {{$answer->bet_rate}}
                            </span>
                          </div>
                        </div>
                      </div>

                    @endif
                    @endforeach
                    <!--END ANSWER LOOP -->

                    </div>
                  </div>
                </div>

                @endif
                @endforeach
                <!-- END QUESTION LOOP -->

              </div>
            </div>
          </div>
        </div>
      </div>

      @endif
      @endforeach
      <!--END GAME LOOP -->

    </div>
    <!-- ===============================END LIVE SECTION================================ -->

  </div>

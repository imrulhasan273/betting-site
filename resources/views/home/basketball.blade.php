<div id="tab4" class="tab-pane fade">

    <!-- =====================START LIVE SECTION================================ -->
    <div style="margin-top: 111px;">
        @php
            $Collection = App\Game::where([['status','=','live'],['type_id', '=', 3]])->get();
            $LiveCount = $Collection->count();
        @endphp
        <div class="live" data-toggle="collapse" href="#BBtab3collapse" data-parent="#accordion">
            <span class="live_text" style="color:yellow">LIVE MATCHES </span>
            <span style="float: right;color: #fff;">{{$LiveCount}} Matches</span>
        </div>

        @php
            $quesCount=1;
            $ansCount=1;
        @endphp

        <div class="panel-collapse collapse in" id="BBtab3collapse">

            <!-- START GAME LOOP -->
            @foreach ($games as $game)
            @if ($game->type->name == 'basket_ball' && $game->status=='live')
            @php
                $quesCount++;
            @endphp
            <div class="" data-toggle="collapse" data-parent="#accordion" href="#BBtab33419{{$quesCount}}" style="background:#147B45;padding: 12px 7px;min-height:54px;">
                <span class="gameicon"><img src="{{asset('frontend/img/BB.png')}}" width="27px;"></span>
                <h3 class="panel-title ">
                    {{ $game->name }}, {{ $game->tournament_name }} || {{ $game->date }} || {{ $game->time }}
                </h3>
            </div>
            <div id="BBtab33419{{$quesCount}}" class="panel-collapse collapse in">
                <div id="3419" class="panel-collapse collapse in">
                    <div class="que" style="">
                        <div class="collapse_2nd" style="">

                            <!-- START QUESTION LOOP -->
                            @foreach ($questions as $question)
                            @if ($game->id == $question->game_id && $question->is_active==1)
                            @php
                                $ansCount++
                            @endphp

                            <div class="qtitle" data-toggle="collapse" data-parent="#accordion" href="#BBq323845{{$ansCount}}" style="">
                                <h4 class="panel-title qtitletext">
                                    {{$question->question}}<span class="" style="margin-left: 5px;color:#ff3b30!important;font-size:.7em;"><i> LIVE</i></span>
                                </h4>
                            </div>
                            <div id="BBq323845{{$ansCount}}" class="panel-collapse">
                                <div class="container-fluid">
                                    <div class="row" style="background: #5F5F5F">

                                        <!-- ANSWER LOOP -->
                                        @foreach ($answers as $answer)
                                        @if ($question->id == $answer->question_id && $answer->status == 'active' && $answer->result=='')
                                        <div class="col-md-3 col-xs-6 ans" style="cursor: pointer; margin-top: 0px;border:1px solid #777A7D;">
                                            <div class="data-show" data-toggle="modal" data-target="#betting" style="" id="select "
                                                data-game_id = "{{$game->id}}"
                                                data-match = "{{$game->name}} | {{$game->tournament_name}} | {{$game->date}} | {{$game->time}}"
                                                data-type_id = "{{$game->type_id}}"
                                                data-game = "{{$game->name}}"
                                                data-status = "{{$game->status}}"
                                                data-ques_id = "{{$question->id}}"
                                                data-ques = "{{$question->question}}"
                                                data-ans_id = "{{$answer->id}}"
                                                data-ans = "{{$answer->answer}}"
                                                data-ans_bet_rate = "{{$answer->bet_rate}}">
                                                <div class="" align="center" style="color:#fff;background:#5F5F5F;">
                                                    {{$answer->answer}}
                                                    <span class="" text-align="center" style="color:#F9CD51;">
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
            @endif
            @endforeach
        </div>
        <!--END GAME LOOP -->
    </div>
    <!-- ===============================END LIVE SECTION================================ -->




    <!-- =====================START UPCOMING SECTION================================ -->
    <div>
        @php
            $Collection = App\Game::where([['status','=','upcoming'],['type_id', '=', 3]])->get();
            $UpcomingCount = $Collection->count();
        @endphp
        <div class="live" data-toggle="collapse" href="#BBUtab3collapse" data-parent="#accordion">
            <span class="live_text" style="color:yellow">UPCOMING MATCHES </span>
            <span style="float: right;color: #fff;">{{$UpcomingCount}} Matches</span>
        </div>

        @php
            $quesCountU=1;
            $ansCountU=1;
        @endphp

        <div class="panel-collapse collapse in" id="BBUtab3collapse">

            <!-- START GAME LOOP -->
            @foreach ($games as $game)
            @if ($game->type->name == 'basket_ball' && $game->status=='upcoming')
            @php
                $quesCountU++;
            @endphp
            <div class="" data-toggle="collapse" data-parent="#accordion" href="#BBUtab33419{{$quesCountU}}" style="background:#147B45;padding: 12px 7px;min-height:54px;">
                <span class="gameicon"><img src="{{asset('frontend/img/BB.png')}}" width="27px;"></span>
                <h3 class="panel-title ">
                    {{ $game->name }}, {{ $game->tournament_name }} || {{ $game->date }} || {{ $game->time }}
                </h3>
            </div>
            <div id="BBUtab33419{{$quesCountU}}" class="panel-collapse collapse in">
                <div id="3419" class="panel-collapse collapse in">
                    <div class="que" style="">
                        <div class="collapse_2nd" style="">

                            <!-- START QUESTION LOOP -->
                            @foreach ($questions as $question)
                            @if ($game->id == $question->game_id && $question->is_active==1)
                            @php
                                $ansCountU++
                            @endphp

                            <div class="qtitle" data-toggle="collapse" data-parent="#accordion" href="#BBUq323845{{$ansCountU}}" style="">
                                <h4 class="panel-title qtitletext">
                                    {{$question->question}}<span style="margin-left: 5px;color:#37b000!important;font-size:.7em;"><i> UPCOMING</i></span>
                                </h4>
                            </div>
                            <div id="BBUq323845{{$ansCountU}}" class="panel-collapse">
                                <div class="container-fluid">
                                    <div class="row" style="background: #5F5F5F">

                                        <!-- ANSWER LOOP -->
                                        @foreach ($answers as $answer)
                                        @if ($question->id == $answer->question_id && $answer->status == 'active' && $answer->result=='')
                                        <div class="col-md-3 col-xs-6 ans" style="cursor: pointer; margin-top: 0px;border:1px solid #777A7D;">
                                            <div class="data-show" data-toggle="modal" data-target="#betting" style="" id="select "
                                                data-game_id = "{{$game->id}}"
                                                data-match = "{{$game->name}} | {{$game->tournament_name}} | {{$game->date}} | {{$game->time}}"
                                                data-type_id = "{{$game->type_id}}"
                                                data-game = "{{$game->name}}"
                                                data-status = "{{$game->status}}"
                                                data-ques_id = "{{$question->id}}"
                                                data-ques = "{{$question->question}}"
                                                data-ans_id = "{{$answer->id}}"
                                                data-ans = "{{$answer->answer}}"
                                                data-ans_bet_rate = "{{$answer->bet_rate}}">
                                                <div class="" align="center" style="color:#fff;background:#5F5F5F;">
                                                    {{$answer->answer}}
                                                    <span class="" text-align="center" style="color:#F9CD51;">
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
            @endif
            @endforeach
        </div>
        <!--END GAME LOOP -->
    </div>
    <!-- ===============================END UPCOMING SECTION================================ -->

  </div>

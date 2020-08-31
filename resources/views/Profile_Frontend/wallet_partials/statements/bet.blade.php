@php
    $bets = App\Bet::where('bet_by', Auth::user()->id)->get();
@endphp
<div class="col-lg-12  bhoechie-tab">
    <div class="bhoechie-tab-content">
        <center>
            <div class="">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="tile">
                            <div class="tile-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="sampleTable0">
                                        <thead>
                                            <tr>
                                                <th scope="col">SN.</th>
                                                <th scope="col">Time And Date</th>
                                                <th scope="col">Match</th>
                                                <th scope="col">Game</th>
                                                <th scope="col">Question</th>
                                                <th scope="col">Answer</th>
                                                <th scope="col" class="text-center">Amount</th>
                                                <th scope="col" class="text-center">Return Rate</th>
                                                <th scope="col" class="text-center">Total Win</th>
                                                <th scope="col" class="text-center">Return Amount(Won)</th>
                                                <th scope="col" class="text-center">Club Fee</th>
                                                <th scope="col" class="text-center">Status</th>
                                                <th scope="col" class="text-center">Date</th>
                                            </tr>
                                        </thead>
                                        @foreach ($bets as $bet)

                                        <tbody>
                                            <tr>
                                                <td>
                                                    SL
                                                </td>
                                                <td>
                                                    {{$bet->created_at}}
                                                </td>
                                                <td>
                                                    {{$bet->match}}
                                                </td>
                                                <td>
                                                    {{$bet->game->name}}
                                                </td>
                                                <td>
                                                    {{$bet->question->question}}
                                                </td>
                                                <td>
                                                    {{$bet->answer->answer}}
                                                </td>
                                                <td>
                                                    {{$bet->amount}}
                                                </td>
                                                <td>
                                                    {{$bet->return_rate}}
                                                </td>
                                                <td>
                                                    {{$bet->total_win}}
                                                </td>
                                                <td>
                                                    {{$bet->return_amount}}
                                                </td>
                                                <td>
                                                    {{$bet->club_fee}}
                                                </td>
                                                <td>
                                                    {{$bet->status}}
                                                </td>

                                            </tr>
                                       </tbody>

                                       @endforeach
                                    </table>
                                </div><!--end of .table-responsive-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </div>
</div>

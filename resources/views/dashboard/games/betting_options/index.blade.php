@php
$active='games';
@endphp
@extends('layouts.backend')
@section('content')
<div class="row">

    <div class="col-md-12">
        <x-alert/>
    </div>

    <div class="col-md-2">
        <a href="{{route('admin.games.bet.question.add',[$game->id])}}" name="add" class="btn btn-primary ">
            <span class="material-icons">
            add_circle_outline
            </span>
            Add Question
        </a>
    </div>

        <!-- AUTO STACK ADD -->
        <div style="padding-left:50%;">
            <form method="POST" action="{{ route('admin.games.addStack') }}" enctype="multipart/form-data">
                @csrf
                <div class="">
                    <input name="game_id" type="text" value="{{ $game->id }}" hidden>
                    <select name="autoStack" class="selectpicker" data-size="7" data-style="btn btn-success btn-round" title="Select from Stack">
                        <option disabled selected>Stacks</option>
                        @foreach ($autoStackCats as $autoStackCat)
                            <option value="{{$autoStackCat->id}}">{{$autoStackCat->name}}</option>
                        @endforeach
                    </select>
                    <button name="submit" type="submit" class="btn btn-success ">
                        <span class="material-icons">
                        add_circle_outline
                        </span>
                    </button>
                </div>
            </form>
        </div>
        <!-- AUTO STACK ADD -->

    <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-header card-header-primary">
            <h4 class="card-title mt-0">Bet Options ({{ $game->id }})</h4>
            <p style="color:burlywood;" class="card-category">
                Game Name: {{ $game->name }} |
                Tournament: {{ $game->tournament_name }} |
                Status: {{ $game->status }} |
                Date: {{ $game->date }} |
                Time: {{ $game->time }}
            </p>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <!-- Nested Table -->
                @foreach ($questions as $question)
                @if ($game->id == $question->game_id)
                <div class="col-md-12">
                    <div class="card card-plain">
                        @if($question->is_active==1)
                        <div class="card-header card-header-info">
                        @else
                        <div class="card-header card-header-danger">
                        @endif
                            <h4 style="color: black; font-weight:bold" class="card-title mt-0">
                                {{ $question->question}}
                                <a href="{{ route('admin.games.question.status',[$game->id,$question->id,1]) }}" class="btn btn-outline-secondary bg-warning" style="float:right;backgounrd: #4267B2;">
                                    @if ($question->is_active==true)
                                    <i class="material-icons">check_circle</i>
                                    @else
                                    <i class="material-icons">airplanemode_inactive</i>
                                    @endif
                                </a>
                                <a href="{{ route('admin.games.bet.question.destroy',[$question->id]) }}" class="btn btn-outline-secondary bg-danger" style="float:right;backgounrd: #4267B2;">
                                    <i class="material-icons">delete</i> Question
                                </a>
                                <a href="{{ route('admin.games.bet.ques.answer.add',[$game->id,$question->id]) }}" class="btn btn-outline-secondary bg-success" style="float:right;backgounrd: #4267B2;">
                                    <span class="material-icons">
                                        add_circle_outline
                                    </span> Answer +
                                </a>

                                {{-- BTN to active/inactive all the answers for a Question --}}
                                <a id="QUES_ID_{{$question->id}}" class="btn btn-outline-secondary bg-success" style="float:right;backgounrd: #4267B2;">
                                    <span id="" class="material-icons">
                                        check_circle
                                    </span>Ans
                                    <span class="material-icons">
                                        airplanemode_inactive
                                    </span>
                                </a>
                                {{--  -- - - - - End - -- - - --}}
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-plain">
                        <table class="table table-hover">
                            <thead class="">
                                <th class="td-actions text-center">
                                    Answer
                                </th>
                                <th class="td-actions text-center">
                                    Bet Rate
                                </th>
                                <th class="td-actions text-center">
                                   Place
                                </th>
                                <th class="td-actions text-center">
                                    Bet Amount
                                </th>
                                <th class="td-actions text-center">
                                    Return Amount
                                </th>
                                <th class="td-actions text-center">
                                    Status
                                </th>
                                <th class="td-actions text-center">
                                    Result
                                </th>
                                <th class="td-actions text-center">
                                    Action
                                </th>
                                <th class="td-actions text-center">
                                    Action
                                </th>
                            </thead>

                            @foreach ($answers as $answer)
                            @if($question->id == $answer->question_id)
                            <tbody>
                                @if ($answer->status=='inactive')
                                <tr class="backG_{{$question->id}}" style="background: #e9808f">
                                @elseif($answer->status=='active')
                                <tr class="backG_{{$question->id}}" style="background: #8fda99">
                                @elseif($answer->status=='win')
                                <tr class="backG_{{$question->id}}" style="background: rgb(32, 199, 121)">
                                @elseif($answer->status=='loss')
                                <tr class="backG_{{$question->id}}" style="background: rgb(212, 7, 38)">
                                @endif
                                    <td class="td-actions text-center">
                                        {{$answer->answer}}
                                    </td>
                                    <td class="td-actions text-center">
                                        {{$answer->bet_rate}}
                                        {{-- <a data-toggle="modal" data-target="#changeBet" class="btn" type="button"
                                            data-ans_id = "{{$answer->id}}"
                                            data-ans_bet_rate = "{{$answer->bet_rate}}">
                                            <div class="" align="center" style="color:#fff;">
                                                <span id="" class="" text-align="center" style="color:#000000;">
                                                    {{$answer->bet_rate}}
                                                </span>
                                            </div>
                                        </a> --}}
                                        <div class="data-show btn" data-toggle="modal"data-target="#changeBetRate" style="" id="select "
                                            data-ans_id = "{{$answer->id}}"
                                            data-ans_bet_rate = "{{$answer->bet_rate}}">

                                            <div class="" align="center" style="color:#fff;">
                                                <span id="" class="" text-align="center" style="color:#000000;">
                                                    {{$answer->bet_rate}}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="td-actions text-center">
                                        {{$answer->place}}
                                    </td>
                                    <td class="td-actions text-center">
                                        {{$answer->bet_amount}}
                                    </td>
                                    <td class="td-actions text-center">
                                        {{$answer->rtrn_amount}}
                                    </td>
                                    <td class="td-actions text-center ques_id_{{$question->id}}">
                                        {{$answer->status}}
                                        <a href="{{ route('admin.games.bet.ques.answer.status',[$game->id,$answer->id,1]) }}" type="button" rel="tooltip" class="btn btn-warning">
                                            <i class="material-icons">av_timer</i>
                                        </a>
                                    </td>

                                    <td class="td-actions text-center">
                                        {{ $answer->result }}
                                    </td>

                                    <td class="td-actions text-center">
                                        {{-- @if($answer->result != 'winned' && $answer->result != 'lossed') --}}
                                        <a href="{{ route('admin.games.bet.ques.answer.result',[$question->id,$answer->id]) }}" type="button" rel="tooltip" class="btn btn-primary">
                                            <i class="material-icons">assignment_return</i>back
                                        </a>
                                        {{-- @endif --}}
                                        {{-- <a href="" type="button" rel="tooltip" class="btn btn-danger">
                                            <i class="material-icons">get_app</i>return
                                        </a> --}}
                                    </td>
                                    <td class="td-actions text-center">
                                        <a href="{{ route('admin.games.bet.ques.answer.edit',[$game->id,$answer->id]) }}" type="button" rel="tooltip" class="btn btn-success">
                                            <i class="material-icons">edit</i>
                                          </a>
                                        <a href="{{ route('admin.games.bet.ques.answer.destroy',[$answer->id]) }}" type="button" rel="tooltip" class="btn btn-danger">
                                            <i class="material-icons">close</i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                            @endif
                            @endforeach
                        </table>
                    </div>
                </div>
                @endif
                @endforeach
            <!-- Nested Table -->
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

{{-- <!-- START SCRIPTS FOR DEPOSIT -->
@include('dashboard.games.betting_options.changeBet_modal')
<!-- END SCRIPTS FOR DEPOSIT --> --}}

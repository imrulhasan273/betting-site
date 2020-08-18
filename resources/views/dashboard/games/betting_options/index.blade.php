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
                <div class="col-md-12">
                    <div class="card card-plain">
                        <div class="card-header card-header-info">
                            <h4 style="color: black; font-weight:bold" class="card-title mt-0">{{ $question->question}} <a href="{{ route('admin.games.bet.ques.answer.add',[$game->id,$question->id]) }}" class="btn btn-outline-secondary bg-success" style="float:right;backgounrd: blue;">Add Answer</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-plain">
                        <table class="table table-hover">
                            <thead class="">
                                <th>
                                    Answer
                                </th>
                                <th>
                                    Bet Rate
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Action
                                </th>
                            </thead>
                            @foreach ($answers as $answer)
                            @if($question->id == $answer->question_id)
                            <tbody>
                                <tr>
                                    <td>
                                        {{$answer->answer}}
                                    </td>
                                    <td>
                                        {{$answer->bet_rate}}
                                    </td>
                                    <td>
                                        Status
                                    </td>
                                    <td>
                                        Action
                                    </td>
                                </tr>
                            </tbody>
                            @endif
                            @endforeach
                        </table>
                    </div>
                </div>
                @endforeach


            <!-- Nested Table -->
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

@php
$active='games';
@endphp
@extends('layouts.backend')
@section('content')
<div class="row">

    <div class="col-md-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Answer Modification</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body">

        <form method="POST" action="{{route('admin.games.bet.ques.answer.update')}}" enctype="multipart/form-data">
        @csrf

            <div class="col-md-12" hidden>
                <div class="form-group">
                    <label class="bmd-label-floating">Game ID</label>
                    <input name="game_id" value="{{ $game_id }}" type="text" class="form-control">
                </div>
            </div>

            <div class="col-md-12" hidden>
                <div class="form-group">
                    <label class="bmd-label-floating">Answer</label>
                    <input name="answer_id" value="{{ $answer->id }}" type="text" class="form-control">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label class="bmd-label-floating">Answer</label>
                    <input name="answer" value="{{ $answer->answer }}" type="text" class="form-control">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label class="bmd-label-floating">Bet Rate</label>
                    <input name="bet_rate" value="{{ $answer->bet_rate }}" type="text" class="form-control">
                </div>
            </div>

            <button name="submit" type="submit" class="btn btn-primary pull-right">Update Answer</button>
            <div class="clearfix"></div>
        </form>
        </div>
      </div>
    </div>

</div>
@endsection

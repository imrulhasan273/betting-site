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
          <h4 class="card-title">Game Modification</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body">
        <form method="POST" action="{{route('games.update')}}">
        @csrf
        <div class="row">

            <div class="col-md-5" hidden>
                <div class="form-group">
                  <label class="bmd-label-floating">ID</label>
                  <input name="id" value="{{ $game->id }}" type="text" class="form-control">
                </div>
            </div>

            <div class="col-lg-5 col-md-6 col-sm-3">
                <select name="type_id" class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" title="Game Type">
                @foreach ($types as $type)
                    <option style="color: rgb(19, 146, 219)" value="{{$type->id}}" {{ $type->id == $game->type_id ? 'selected':'' }}>{{$type->display_name}}</option>
                @endforeach
                </select>
            </div>

            <div class="col-lg-5 col-md-6 col-sm-3">
                <select name="status" class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" title="Game Status">
                    <option style="color: rgb(20, 211, 77)" value="live" {{ $game->status == 'live' ? 'selected':'' }}>Live</option>
                    <option style="color: rgb(231, 9, 9)" value="upcoming" {{ $game->status == 'upcoming' ? 'selected':'' }}>Upcomming</option>
                </select>
            </div>


            <div class="col-md-3">
                <div class="form-group">
                    <label class="bmd-label-floating">Country 1</label>
                    <input value="{{ $c1 }}" name="c1" value="" type="text" class="form-control">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="bmd-label-floating">Country 2</label>
                    <input value="{{ $c2 }}"  name="c2" value="" type="text" class="form-control">
                </div>
            </div>


            <div class="col-md-4">
                <label class="bmd-label-floating">Date</label>
                <input name="date" type="text" class="form-control datepicker" value="{{ $game->date }}">
            </div>

            <div class="col-md-4">
                <label class="bmd-label-floating">Time</label>
                <input name="time" type="text" class="form-control timepicker" value="{{ $game->time }}">
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label class="bmd-label-floating">Tournament Name</label>
                    <input name="tournament_name" value="{{ $game->tournament_name }}" type="text" class="form-control">
                </div>
            </div>
        </div>

            <button name="submit" type="submit" class="btn btn-primary pull-right">Update Game</button>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>

</div>
@endsection


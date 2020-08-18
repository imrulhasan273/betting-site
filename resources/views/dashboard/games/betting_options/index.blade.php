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
        <a href="{{route('games.add')}}" name="add" class="btn btn-primary ">Add Question</a>
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

          </div>
        </div>
      </div>
    </div>
</div>
@endsection

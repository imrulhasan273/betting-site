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
        <a href="{{route('games.add')}}" name="add" class="btn btn-primary ">Add Game</a>
    </div>

    <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0">Games</h4>
          <p class="card-category"> All the games appearing here</p>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="">
                <th>
                    ID
                </th>
                <th>
                    Game Type
                </th>
                <th>
                    Game Name
                </th>
                <th>
                    Tournament Name
                </th>
                <th>
                    Game Day
                </th>
                <th>
                    Game Time
                </th>
                <th>
                    Game Update
                </th>
                <th>
                    Betting Option
                </th>
                <th>
                    Status
                </th>
                <th>
                    Action
                </th>
                <th>
                   Action
                </th>
                <th>
                    Action
                </th>
              </thead>
              @foreach ($games as $game)
                <tbody>
                    <tr>
                        <td>
                            {{$game->id}}
                        </td>
                        <td>
                            {{$game->type->name}}
                        </td>
                        <td>
                            {{$game->name}}
                        </td>
                        <td>
                            {{$game->tournament_name}}
                        </td>
                        <td>
                            {{$game->date}}
                        </td>
                        <td>
                            {{$game->time}}
                        </td>
                        <td>
                            {{$game->game_update}}
                        </td>
                        <td>
                            <a href="">Betting Options</a>
                        </td>
                        <td>
                            {{$game->status}}
                        </td>
                        <td>
                            <a href="">Action</a>
                        </td>
                        <td>
                            <a href="">Action</a>
                        </td>
                        <td>
                            <a href="">Action</a>
                        </td>
                    </tr>
                </tbody>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

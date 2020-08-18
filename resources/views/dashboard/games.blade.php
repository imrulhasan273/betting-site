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
                    Type
                </th>
                <th>
                    Name
                </th>
                <th>
                    Tournament
                </th>
                <th>
                    Day
                </th>
                <th>
                    Time
                </th>
                <th>
                    Update
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
                        <td class="td-actions text-left">
                            {{$game->game_update}}
                            <a href="" type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">sync</i>
                            </a>
                        </td>
                        <td class="td-actions text-center">
                            <a href="" type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">gavel</i>
                            </a>
                        </td>
                        <td class="td-actions text-left">
                            {{$game->status}}
                            <a href="" type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">av_timer</i>
                            </a>
                        </td>
                        <td class="td-actions text-right">
                            <a href="" type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">check_circle</i>
                            </a>
                            <a href="" type="button" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">edit</i>
                            </a>
                            <a href="" type="button" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">close</i>
                            </a>
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

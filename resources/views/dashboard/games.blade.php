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
                <th class="td-actions text-center">
                    ID
                </th>
                <th class="td-actions text-center">
                    Type
                </th>
                <th class="td-actions text-center">
                    Name
                </th>
                <th class="td-actions text-center">
                    Tournament
                </th>
                <th class="td-actions text-center">
                    Day
                </th>
                <th class="td-actions text-center">
                    Time
                </th>
                <th class="td-actions text-center">
                    Update
                </th>
                <th class="td-actions text-center">
                    Betting Option
                </th>
                <th class="td-actions text-center">
                    Status
                </th>
                <th class="td-actions text-center">
                    Action
                </th>
              </thead>
              @foreach ($games as $game)
                <tbody>
                    @if ($game->status=='hidden')
                    <tr style="background: rgb(233, 128, 143)">
                    @elseif($game->status=='live')
                    <tr style="background: rgb(143, 218, 153)">
                    @else
                    <tr style="background: rgb(173, 224, 228)">
                    @endif
                        <td class="td-actions text-center">
                            {{$game->id}}
                        </td>
                        <td class="td-actions text-center">
                            {{$game->type->name}}
                        </td>
                        <td class="td-actions text-center">
                            {{$game->name}}
                        </td>
                        <td class="td-actions text-center">
                            {{$game->tournament_name}}
                        </td>
                        <td class="td-actions text-center">
                            {{$game->date}}
                        </td>
                        <td class="td-actions text-center">
                            {{$game->time}}
                        </td>
                        <td class="td-actions text-center">
                            {{$game->game_update}}
                            <a href="" type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">sync</i>
                            </a>
                        </td>
                        <td class="td-actions text-center">
                            <a href="{{ route('admin.games.bet',[$game->id]) }}" type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">gavel</i>
                            </a>
                        </td>
                        <td class="td-actions text-center">
                            {{$game->status}}
                            <a href="{{ route('admin.games.status',[$game->id,1]) }}" type="button" rel="tooltip" class="btn btn-warning">
                                <i class="material-icons">av_timer</i>
                            </a>
                        </td>
                        <td class="td-actions text-center">
                            <a href="{{ route('admin.games.status',[$game->id,2]) }}" type="button" rel="tooltip" class="btn btn-warning">
                                @if($game->status!='hidden')
                                <i class="material-icons">check_circle</i>
                                @else
                                <i class="material-icons">airplanemode_inactive</i>
                                @endif
                            </a>
                            <a href="{{ route('games.edit',[$game->id]) }}" type="button" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">edit</i>
                            </a>
                            <a href="{{ route('games.destroy',[$game->id]) }}" type="button" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">close</i>
                            </a>
                            <a href="" type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">done_all</i>done
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

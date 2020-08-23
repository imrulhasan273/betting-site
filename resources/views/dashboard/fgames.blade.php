@php
$active='fgames';
@endphp
@extends('layouts.backend')
@section('content')
<div class="row">

    <div class="col-md-12">
        <x-alert/>
    </div>

    <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0">Games</h4>
          <p class="card-category"> All the finished games appearing here</p>
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
                    @if($game->status=='finished')

                    @if ($game->status=='hidden')
                    <tr style="background: rgb(233, 128, 143)">
                    @elseif($game->status=='live')
                    <tr style="background: rgb(143, 218, 153)">
                    @else
                    <tr style="background: rgb(241, 117, 15)">
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
                            <a href="{{ route('admin.games.bet',[$game->id]) }}" type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">gavel</i>
                            </a>
                        </td>
                        <td class="td-actions text-center">
                            {{$game->status}}
                        </td>
                        <td class="td-actions text-center">
                            <a href="{{ route('games.destroy',[$game->id]) }}" type="button" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">close</i>
                            </a>
                        </td>
                    </tr>

                    @endif
                </tbody>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

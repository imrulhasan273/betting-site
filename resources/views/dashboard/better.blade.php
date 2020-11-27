@php
$active='games';
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
          <h4 class="card-title mt-0">View Betters</h4>
            <p class="card-category">Answer : {{$answer->answer}}</p>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover" id="datatable" style="width:100%">
              <thead class="">
                <tr>
                    <th>
                    Bet By
                </th>
                <th>
                    Date & Time
                </th>
                <th>
                    Match
                </th>
                <th>
                    Question
                </th>
                <th>
                    Answer
                </th>
                <th>
                    Amount
                </th>
                <th>
                    Return Rate
                </th>
                <th>
                    Total Win
                </th>
                <th>
                    Return Amount
                </th>
                <th>
                    Club Fee (0.01%)
                </th>
                <th>
                    Status
                </th>
                </tr>
              </thead>
                <tbody>
                    @foreach ($betters as $bet)
                    @if ($bet->status=='cancelled')
                    <tr style="background: rgb(221, 40, 67);color:white">
                    @elseif($bet->status=='win')
                    <tr style="background: rgb(59, 224, 81)">
                    @elseif($bet->status=='loss')
                    <tr style="background: rgb(248, 146, 12)">
                    @else
                    <tr style="background: rgb(197, 182, 169);color:black">
                    @endif
                        <td>
                            {{$bet->user->user_name ?? null}}
                        </td>
                        <td>
                            {{$bet->created_at}}
                        </td>
                        <td>
                            {{$bet->match}}
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
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

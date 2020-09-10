@php
$active='clubsTR';
$authRole = Auth::check() ? Auth::user()->role->pluck('name')->toArray() : [];
$authRole = $authRole[0];
$sl=0;
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
          <h4 class="card-title mt-0">Clubs Transection History</h4>
          <p class="card-category">clubs</p>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
              <thead class="">
                <tr>
                    <tr>
                        <th scope="col">SN.</th>
                        <th scope="col">Club Name</th>
                        <th scope="col">Owner (User Name)</th>
                        <th scope="col">From (User Name)</th>
                        <th scope="col">Debit</th>
                        <th scope="col">Credit</th>
                        <th scope="col" class="text-center">balance</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date &amp; Time</th>
                    </tr>
                </tr>
                </thead>

                @foreach ($transections as $transection)
                @php
                    $clubName = App\Club::where('id',$transection->club_id)->pluck('name')[0];
                    $ClubOwnerName = App\User::where('id',$transection->club_owner_id)->pluck('name')[0];
                    $fromUser = App\User::where('id',$transection->from_id)->pluck('user_name')[0];
                @endphp
                <tbody>
                    <tr>
                        <th scope="col">{{ ++$sl }}</th>
                        <th scope="col">{{$clubName}}</th>
                        <th scope="col">{{ $ClubOwnerName}}</th>
                        <th scope="col">{{$fromUser}}</th>
                        <th scope="col">{{$transection->debit}}</th>
                        <th scope="col">{{$transection->credit}}</th>
                        <th scope="col" class="text-center">{{$transection->balance}}</th>
                        <th scope="col">{{$transection->description}}</th>
                        <th scope="col">{{$transection->created_at}}</th>
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

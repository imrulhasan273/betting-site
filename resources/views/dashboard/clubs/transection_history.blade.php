@php
$active='clubsTR';
$authRole = Auth::check() ? Auth::user()->role->pluck('name')->toArray() : [];
$authRole = $authRole[0];
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
                        <th scope="col">club_id</th>
                        <th scope="col">club_owner_id</th>
                        <th scope="col">from_id</th>
                        <th scope="col">debit</th>
                        <th scope="col">credit</th>
                        <th scope="col" class="text-center">balance</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date &amp; Time</th>
                    </tr>
                </tr>
                </thead>

                @foreach ($transections as $transection)
                <tbody>
                    <tr>
                        <th scope="col">SN.</th>
                        <th scope="col">{{$transection->club_id}}</th>
                        <th scope="col">{{$transection->club_owner_id}}</th>
                        <th scope="col">{{$transection->from_id}}</th>
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

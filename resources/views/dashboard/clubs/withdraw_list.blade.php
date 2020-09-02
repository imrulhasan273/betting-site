@php
$active='clubsWidth';
$authRole = Auth::check() ? Auth::user()->role->pluck('name')->toArray() : [];
@endphp
@extends('layouts.backend')
@section('content')
<div class="row">

    <div class="col-md-12">
        <x-alert/>
    </div>

    <div class="col-md-2">
    <a href="{{ route('admin.clubs.withdraw.request') }}" name="add" class="btn btn-warning ">Place Withdraw Request</a>
    </div>

    <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0">Clubs Withdraw List</h4>
          {{-- <p class="card-category">Clubs Withdraw List</p> --}}
        </div>

        <div class="card-body">
          <div class="table-responsive">
<table id="datatable" class="table table-striped table-bordered" style="width:100%">
              <thead class="">
             <tr>
                <th>Sl.</th>
                <th>Club Name</th>
                <th>Amount</th>
                <th>Time</th>
                <th>Action</th>
             </tr>
              </thead>

                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

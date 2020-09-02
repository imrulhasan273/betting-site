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
    <a href="{{ route('admin.clubs.withdraw.list') }}" name="add" class="btn btn-warning ">View Withdraw Requests</a>
    </div>

    <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-header card-header-info">
          <h4 class="card-title mt-0">Place Withdraw Request</h4>
        </div>

        <div class="card-body">
       <form action="" method="post">
           <div class="form-group">
               <label><strong>Amount</strong></label>
               <input type="number" name="withdraw_quantity" id="withdraw_quantity" class="form-control">
           </div>
           <div class="form-group">
               <label><strong>Note</strong></label>
               <textarea name="withdraw_note" id="withdraw_note" cols="30" rows="5" class="form-control"></textarea>
           </div>
           <div class="form-group">
               <button class="btn btn-primary">Place Request</button>
           </div>
       </form>

        </div>
      </div>
    </div>
</div>
@endsection

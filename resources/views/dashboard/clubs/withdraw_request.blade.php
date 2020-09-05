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
       <form action="{{route('admin.clubs.withdraw.place')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-3">
                <select name="method" class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" title="Method">
                <option disabled selected>Method</option>
                <option value="Bkash">Bkash</option>
                <option value="Rocket">Rocket</option>
                </select>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-3">
                <select name="type" class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" title="Type">
                <option disabled selected>Type</option>
                <option value="personal">Personal</option>
                <option value="agent">Agent</option>
                </select>
            </div>
        </div>


           <div class="form-group">
               <label><strong>Amount</strong></label>
               <input type="number" name="amount" id="withdraw_quantity" class="form-control">
           </div>

           <div class="form-group">
                <label><strong>Widthdraw To</strong></label>
                <input type="text" name="to" id="widtTo" class="form-control">
            </div>

           <div class="form-group">
               <label><strong>Note</strong></label>
               <textarea name="note" id="withdraw_note" cols="30" rows="5" class="form-control"></textarea>
           </div>

           <div class="form-group pull-right">
               <button class="btn btn-primary">Place Request</button>
           </div>
       </form>

        </div>
      </div>
    </div>
</div>
@endsection

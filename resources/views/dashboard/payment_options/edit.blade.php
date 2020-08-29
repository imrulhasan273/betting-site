@php
$active='payments';
$authRole = Auth::check() ? Auth::user()->role->pluck('name')->toArray() : [];
@endphp
@extends('layouts.backend')

@section('content')
<div class="row">

    <div class="col-md-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Payment Option Modification</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body">
        <form method="POST" action="{{route('paymentsOptions.update')}}">
        @csrf

            <div class="row">
                <div class="col-md-5" hidden>
                    <div class="form-group">
                      <label class="bmd-label-floating">ID</label>
                      <input name="id" value="{{ $paymentOption->id }}" type="text" class="form-control">
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-3">
                    <label class="bmd-label-floating">Method</label>
                    <select name="method" class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" title="Method">
                        <option disabled selected>Method</option>
                        <option style="color: rgb(20, 211, 77)" value="Bikash" {{ $paymentOption->method == 'Bikash' ? 'selected':'' }}>Bikash</option>
                        <option style="color: rgb(20, 211, 77)" value="Rocket" {{ $paymentOption->method == 'Rocket' ? 'selected':'' }}>Rocket</option>
                    </select>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-3">
                    <label class="bmd-label-floating">Type</label>
                    <select name="type" class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" title="Type">
                        <option disabled selected>Type</option>
                        <option style="color: rgb(20, 211, 77)" value="personal" {{ $paymentOption->type == 'personal' ? 'selected':'' }}>Personal</option>
                        <option style="color: rgb(20, 211, 77)" value="agent" {{ $paymentOption->type == 'agent' ? 'selected':'' }}>Agent</option>
                    </select>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-3">
                    <label class="bmd-label-floating">Status</label>
                    <select name="status" class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" title="Status">
                        <option disabled selected>Status</option>
                        <option style="color: rgb(20, 211, 77)" value="active" {{ $paymentOption->status == 'active' ? 'selected':'' }}>Active</option>
                        <option style="color: rgb(20, 211, 77)" value="inactive" {{ $paymentOption->status == 'inactive' ? 'selected':'' }}>In Active</option>
                    </select>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Phone</label>
                        <input name="phone" value="{{ $paymentOption->phone }}" type="text" class="form-control">
                    </div>
                </div>

            </div>

            <button name="submit" type="submit" class="btn btn-primary pull-right">Update Payment Option</button>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>

</div>
@endsection

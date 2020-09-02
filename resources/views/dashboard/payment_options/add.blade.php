@php
$active='payments';
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
          <h4 class="card-title">New Payment Option Addition</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body">

        <form method="POST" action="{{route('payments-option.store')}}" enctype="multipart/form-data">
        @csrf
            <div class="row">

                <div class="col-lg-4 col-md-6 col-sm-3">
                    <label class="bmd-label-floating">Method</label>
                    <select name="method" class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" title="Method">
                      <option disabled selected>Method</option>
                      <option value="Bkash">Bkash</option>
                      <option value="Rocket">Rocket</option>
                    </select>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-3">
                    <label class="bmd-label-floating">Type</label>
                    <select name="type" class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" title="Type">
                      <option disabled selected>Type</option>
                      <option value="personal">Personal</option>
                      <option value="agent">Agent</option>
                    </select>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-3">
                    <label class="bmd-label-floating">Status</label>
                    <select name="status" class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" title="Status">
                      <option disabled selected>Status</option>
                      <option value="active">Active</option>
                      <option value="inactive">Inactive</option>
                    </select>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Phone</label>
                        <input name="phone" value="" type="text" class="form-control">
                    </div>
                </div>

            </div>

                <button name="submit" type="submit" class="btn btn-primary pull-right">Add Payment Option</button>

            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>

</div>
@endsection


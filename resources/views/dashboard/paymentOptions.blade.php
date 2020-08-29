@php
$active='payments';
@endphp
@extends('layouts.backend')
@section('content')
<div class="row">

    <div class="col-md-12">
        <x-alert/>
    </div>

    <div class="col-md-2">
        <a href="{{ route('paymentsOptions.create') }}" name="add" class="btn btn-primary ">Add Payment Option</a>
    </div>

    <div class="col-md-12">

      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0">View Payment Options</h4>
          <p class="card-category">All the options are there</p>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="">
                <th>
                    Method
                </th>
                <th>
                    Type
                </th>
                <th>
                    Phone
                </th>
                <th>
                    Status
                </th>
                <th class="td-actions text-center">
                    Action
                </th>
              </thead>
              @foreach ($paymentOptions as $paymentOption)
                <tbody>
                    @if ($paymentOption->status=='inactive')
                    <tr style="background: rgb(221, 40, 67);color:white">
                    @else
                    <tr style="background: rgb(104, 243, 115);color:black">
                    @endif
                        <td>
                            {{$paymentOption->method}}
                        </td>
                        <td>
                            {{$paymentOption->type}}
                        </td>
                        <td>
                            {{$paymentOption->phone}}
                        </td>
                        <td>
                            {{$paymentOption->status}}
                        </td>
                        <td class="td-actions text-center">
                            <a href="{{ route('paymentsOptions.edit',[$paymentOption->id]) }}" type="button" rel="tooltip" class="btn btn-danger">
                                <i class="material-icons">edit</i>Edit
                              </a>
                            <a href=" {{ route('paymentsOptions.destroy',[$paymentOption->id]) }}" type="button" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">remove</i>Delete
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

@php
$active='Udeposits';
$authRole = Auth::check() ? Auth::user()->role->pluck('name')->toArray() : [];
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
          <h4 class="card-title mt-0">Deposits | USER</h4>
          <p class="card-category">Users with clubs</p>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
              <thead class="">
                <tr>
                    <th>
                    ID
                </th>
                <th>
                    User
                </th>
                <th>
                    Deposit By
                </th>
                <th>
                    Deposit To
                </th>
                <th>
                    Amount
                </th>
                <th>
                    Method
                </th>
                <th>
                    Transection ID
                </th>
                <th>
                    Note
                </th>
                <th>
                    Status
                </th>
                <th>
                    Action
                </th>
            </tr>
              </thead>

                <tbody>
                    @foreach ($deposits as $deposit)
                    <tr>
                        <td>
                            {{$deposit->id}}
                        </td>
                        <td>
                            {{$deposit->user->email}}
                        </td>
                        <td>
                            {{$deposit->deposit_by}}
                        </td>
                        <th>
                            {{$deposit->deposit_to}}
                        </th>
                        <th>
                            {{$deposit->amount}}
                        </th>
                        <td>
                            {{$deposit->method->method}}
                        </td>
                        <td>
                            {{$deposit->transection_id}}
                        </td>
                        <td>
                            {{$deposit->note}}
                        </td>
                        <td>
                            {{$deposit->status}}
                        </td>
                        <td class="td-actions text-center">
                            @if($deposit->status != 'paid')
                            <a href="{{ route('deposits.status',[$deposit->id,1])}}" type="button" rel="tooltip" class="btn btn-success">
                                <i class="material-icons">done</i>
                            </a>
                            @else
                            <a type="button" rel="tooltip" class="btn btn-success">
                                <i class="material-icons">done</i>
                            </a>
                            @endif

                            @if($deposit->status != 'paid')
                            <a onclick="return confirm('This will also delete the User. Delete?')" href="{{ route('deposits.status',[$deposit->id,0])}}" type="button" rel="tooltip" class="btn btn-danger">
                                <i class="material-icons">close</i>
                            </a>
                            @endif
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

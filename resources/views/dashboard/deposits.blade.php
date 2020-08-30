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
            <table class="table table-hover">
              <thead class="">
                <th>
                    ID
                </th>
                <th>
                    User ID
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
                    Method ID
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
              </thead>
              @foreach ($deposits as $deposit)
                <tbody>
                    <tr>
                        <td>
                            {{$deposit->id}}
                        </td>
                        <td>
                            {{$deposit->user_id}}
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
                            {{$deposit->method_id}}
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
                            <a href="" type="button" rel="tooltip" class="btn btn-success">
                                <i class="material-icons">edit</i>
                            </a>
                            <a onclick="return confirm('This will also delete the User. Delete?')" href="" type="button" rel="tooltip" class="btn btn-danger">
                                <i class="material-icons">close</i>
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
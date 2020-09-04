@php
$active='Uwidthdraws';
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
          <h4 class="card-title mt-0">Widthdraws | USER</h4>
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
                    User
                </th>
                <th>
                    method
                </th>
                <th>
                    method type
                </th>
                <th>
                    Amount
                </th>
                <th>
                    Widthdraw To
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
              @foreach ($widthdraws as $widthdraw)
                <tbody>
                    <tr>
                        <td>
                            {{$widthdraw->id}}
                        </td>
                        <td>
                            {{$widthdraw->user_id}}
                        </td>
                        <td>
                            {{$widthdraw->method}}
                        </td>
                        <th>
                            {{$widthdraw->method_type}}
                        </th>
                        <th>
                            {{$widthdraw->amount}}
                        </th>
                        <td>
                            {{$widthdraw->widthdraw_to}}
                        </td>
                        <td>
                            {{$widthdraw->note}}
                        </td>
                        <td>
                            {{$widthdraw->status}}
                        </td>
                        <td class="td-actions text-center">

                            @if($widthdraw->status =='pending')
                            <a href="{{ route('widthdraws.status',[$widthdraw->id,1])}}" type="button" rel="tooltip" class="btn btn-success">
                                <i class="material-icons">done</i>
                            </a>
                            <a href="{{ route('widthdraws.status',[$widthdraw->id,2])}}" type="button" rel="tooltip" class="btn btn-success">
                                <i class="material-icons">cancel</i>
                            </a>
                            @endif

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

@php
$active='session';
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
          <h4 class="card-title mt-0">View Sessions</h4>
          <p class="card-category">All the options are there</p>
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
                    IP Address
                </th>
                <th>
                    Logged In Time
                </th>
                <th class="td-actions text-center">
                    Action
                </th>
              </thead>
              @foreach ($sessions as $session)
                <tbody>
                    <tr style="background: rgb(186, 46, 241);color:white">
                        <td>
                            {{$session->id}}
                        </td>
                        <td>
                            {{$session->user_id}}
                        </td>
                        <td>
                            {{$session->ip}}
                        </td>
                        <td>
                            {{$session->created_at}}
                        </td>
                        <td class="td-actions text-center">
                            <a href="" type="button" rel="tooltip" class="btn btn-danger">
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

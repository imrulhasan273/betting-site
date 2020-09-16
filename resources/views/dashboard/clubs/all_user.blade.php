@php
$active='club_user_list';
$authRole = Auth::check() ? Auth::user()->role->pluck('name')->toArray() : [];
@endphp
@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-md-12">

      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0">Users</h4>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
              <thead class="">
                <tr>
                <th>Sl.</th>
                <th>Name</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Member since</th>
                </tr>
              </thead>

                <tbody>
                      @foreach ($UserBelongsToClubs as $key=>$user)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->user_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->diffForHumans()}}</td>
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

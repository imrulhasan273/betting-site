@php
$active='users';
$authRole = Auth::check() ? Auth::user()->role->pluck('name')->toArray() : [];
@endphp
@extends('layouts.backend')
@section('content')
<div class="row">


    <div class="col-md-12">
        <x-alert/>
    </div>

    <div class="col-md-2">
    <a href="{{route('users.add')}}" name="add" class="btn btn-primary ">Add User</a>
    </div>

    <div class="col-md-12">

      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0">Users</h4>
          <p class="card-category">Users with roles</p>
        </div>

        <div class="card-body">
          <div class="table-responsive">
<table id="datatable" class="table table-striped table-bordered" style="width:100%">
              <thead class="">
                <tr>
                <th>Sl.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Photo</th>
                <th>Edit</th>
                <th>Delete</th>
                </tr>
              </thead>

                <tbody>
                      @foreach ($users as $user)
                @php
                    $thisRole = $user->role[0];
                @endphp
                    <tr>
                        <td>
                            {{$user->id}}
                        </td>
                        <td>
                            {{$user->name}}
                        </td>
                        <td>
                            {{$user->email}}
                        </td>
                        <td>
                            {{$thisRole->name}}
                        </td>
                        <td>
                            {{$user->photo}}
                        </td>
                        <td>
                            <a href="{{route('users.edit',[$user->id])}}">Edit</a>
                        </td>
                        <td>
                            <a onclick="return confirm('Are You Sure to delete the User?')"  href="{{route('users.destroy',[$user->id])}}">Delete</a>
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

@php
$active='clubs';
$authRole = Auth::check() ? Auth::user()->role->pluck('name')->toArray() : [];
@endphp
@extends('layouts.backend')
@section('content')
<div class="row">


    <div class="col-md-12">
        <x-alert/>
    </div>

    <div class="col-md-2">
    <a href="{{route('clubs.add')}}" name="add" class="btn btn-primary ">Add New Club User</a>
    </div>

    <div class="col-md-12">

      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0">Clubs</h4>
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
                    name
                </th>
                <th>
                    is_active
                </th>
                <th>
                    Club Owner
                </th>
                <th>
                    Owner Email
                </th>
                <th>
                    balance
                </th>
                <th>
                    member
                </th>
                <th>
                    commission
                </th>
                <th>
                    Delete
                </th>
              </thead>
              @foreach ($clubs as $club)

                <tbody>
                    <tr>
                        <td>
                            {{$club->id}}
                        </td>
                        <td>
                            {{$club->name}}
                        </td>
                        <td>
                            {{$club->is_active}}
                        </td>
                        <th>
                            {{$club->user[0]->name}}
                        </th>
                        <th>
                            {{$club->user[0]->email}}
                        </th>
                        <td>
                            {{$club->balance}}
                        </td>
                        <td>
                            {{$club->member}}
                        </td>
                        <td>
                            {{$club->commission}}
                        </td>
                        <td class="td-actions text-center">
                            <a href="{{ route('clubs.edit',[$club->id]) }}" type="button" rel="tooltip" class="btn btn-success">
                                <i class="material-icons">edit</i>
                              </a>
                              <a onclick="return confirm('This will also delete the User. Delete?')" href="{{ route('clubs.destroy',[$club->id,$club->user[0]->id]) }}" type="button" rel="tooltip" class="btn btn-danger">
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

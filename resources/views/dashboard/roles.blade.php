@php
$active='roles';
$authRole = Auth::check() ? Auth::user()->role->pluck('name')->toArray() : [];
@endphp
@extends('layouts.backend')

@section('content')
<div class="row">
    <div class="col-md-2">
    </div>

    <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0">Role</h4>
          <p class="card-category"> Type of roles</p>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="">
                <th>
                    ID
                </th>
                <th>
                    Name
                </th>
                <th>
                    Display Name
                </th>
              </thead>
              @foreach ($roles as $role)

                <tbody>
                    <tr>
                        <td>
                            {{$role->id}}
                        </td>
                        <td>
                            {{$role->name}}
                        </td>
                        <td>
                            {{$role->display_name}}
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

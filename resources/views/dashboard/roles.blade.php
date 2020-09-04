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
            <table class="table table-hover" id="datatable" style="width:100%">
              <thead class="">
                <tr>
                    <th>
                    ID
                </th>
                <th>
                    Name
                </th>
                <th>
                    Display Name
                </th>
                </tr>
              </thead>
                <tbody>
                     @foreach ($roles as $role)
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
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

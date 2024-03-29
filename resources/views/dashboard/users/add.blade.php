@php
$active='users';
@endphp
@extends('layouts.backend')

@section('content')
<div class="row">

    <div class="col-md-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">User Registration</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body">

        <form method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">Name</label>
                        <input name="name" value="" type="text" class="form-control">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">Email</label>
                        <input name="email" value="" type="text" class="form-control">
                    </div>
                </div>



                {{-- <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">Role</label>
                        <select name="role_id" class="form-control">
                            @foreach ($roles as $role)
                                <option style="color: rgb(19, 146, 219)" value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}

                <div class="col-lg-3 col-md-6 col-sm-3">
                    <label class="bmd-label-floating">Role</label>
                    <select name="role_id" class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" title="Role">
                    @foreach ($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">User Name</label>
                        <input name="user_name" value="" type="text" class="form-control">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">Password</label>
                        <input name="password" value="" type="text" class="form-control">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">Re-Password</label>
                        <input name="passwordConfirm" value="" type="text" class="form-control">
                    </div>
                </div>

            </div>

                <button name="submit" type="submit" class="btn btn-primary pull-right">Add User</button>

            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>

</div>
@endsection


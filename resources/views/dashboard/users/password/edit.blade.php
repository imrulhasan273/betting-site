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
          <h4 class="card-title">Password Modification</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body">
        <form method="POST" action="{{route('users.pass.update')}}">
        @csrf
            <div class="row">

                <div class="col-md-5" hidden>
                    <div class="form-group">
                      <label class="bmd-label-floating">ID</label>
                      <input name="id" value="{{ $user->id }}" type="text" class="form-control">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">New Password</label>
                        <input name="password" value="" type="text" class="form-control">
                    </div>
                </div>

            </div>

            <button name="submit" type="submit" class="btn btn-primary pull-right">Update Password</button>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>

</div>@endsection


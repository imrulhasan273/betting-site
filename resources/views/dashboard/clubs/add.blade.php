@php
$active='clubs';
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
          <h4 class="card-title">Club-User Registration</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body">

        <form method="POST" action="{{route('clubs.store')}}" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Name</label>
                        <input name="name" value="" type="text" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Email</label>
                        <input name="email" value="" type="text" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">User Name</label>
                        <input name="user_name" value="" type="text" class="form-control">
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Password</label>
                        <input name="password" value="" type="text" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Re-Password</label>
                        <input name="passwordConfirm" value="" type="text" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Club Name</label>
                        <input name="club_name" value="" type="text" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Club Commission</label>
                        <input name="club_commission" value="" type="text" class="form-control">
                    </div>
                </div>

            </div>

                <button name="submit" type="submit" class="btn btn-primary pull-right">Add Club User</button>

            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>

</div>
@endsection


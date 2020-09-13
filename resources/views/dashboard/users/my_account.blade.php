@php
$active='myacc';
$authRole = Auth::check() ? Auth::user()->role->pluck('name')->toArray() : [];
$authRole = $authRole[0];
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
          <h4 class="card-title">User Modification</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body">
        <form method="POST" action="{{route('users.myaccount.update')}}" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="col-md-5" hidden>
                    <div class="form-group">
                      <label class="bmd-label-floating">ID</label>
                      <input name="id" value="{{ $user->id }}" type="text" class="form-control">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">Name</label>
                        <input name="name" value="{{ $user->name }}" type="text" class="form-control">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">Email</label>
                        <input name="email" value="{{ $user->email }}" type="text" class="form-control">
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        <label class="bmd-label-floating"></label>
                        <img id="output" style="height: 100px" src="{{asset('/storage/profile/'.$user->photo)}}" alt="">
                    </div>
                    <input name="image" type="file" onchange="loadFile(event)" class="form-control">
                </div>
            </div>

            <button name="submit" type="submit" class="btn btn-primary pull-right">Update Info</button>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>

</div>
<script>
    var loadFile = function (event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
@endsection

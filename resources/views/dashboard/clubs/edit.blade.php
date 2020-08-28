@php
$active='clubs';
$authRole = Auth::check() ? Auth::user()->role->pluck('name')->toArray() : [];
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
          <h4 class="card-title">Club Modification</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body">
        <form method="POST" action="{{route('clubs.update')}}">
        @csrf

            <div class="row">
                <div class="col-md-5" hidden>
                    <div class="form-group">
                      <label class="bmd-label-floating">ID</label>
                      <input name="id" value="{{ $club->id }}" type="text" class="form-control">
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                        <label class="bmd-label-floating">Name</label>
                        <input name="name" value="{{ $club->name }}" type="text" class="form-control">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">Commission</label>
                        @if($authRole=='admin' || $authRole == 'super_admin')
                        <input name="commission" value="{{ $club->commission }}" type="text" class="form-control">
                        @else
                        <input name="commission" value="{{ $club->commission }}" type="text" class="form-control" disabled>
                        @endif
                    </div>
                </div>


                <div class="col-lg-5 col-md-6 col-sm-3">
                    <label class="bmd-label-floating">Is Active</label>
                    <select name="is_active" class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" title="Is Active">
                        <option style="color: rgb(20, 211, 77)" value="1" {{ $club->is_active == '1' ? 'selected':'' }}>Yes</option>
                        <option style="color: rgb(231, 9, 9)" value="0" {{ $club->is_active == '0' ? 'selected':'' }}>No</option>
                    </select>
                </div>

            </div>

            <button name="submit" type="submit" class="btn btn-primary pull-right">Update Club</button>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>

</div>@endsection


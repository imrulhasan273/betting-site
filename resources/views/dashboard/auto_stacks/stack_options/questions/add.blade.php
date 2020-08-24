@php
$active='autoStack';
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
          <h4 class="card-title">Question Addition</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body">

        <form method="POST" action="{{route('admin.auto_stack.stack_options.question.store')}}" enctype="multipart/form-data">
        @csrf
            <div class="col-md-12" hidden>
                <div class="form-group">
                    <label class="bmd-label-floating">Category ID</label>
                    <input name="cat_id" value="{{ $autoStackCategory->id }}" type="text" class="form-control">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label class="bmd-label-floating">Question</label>
                    <input name="question" value="" type="text" class="form-control">
                </div>
            </div>

            <button name="submit" type="submit" class="btn btn-primary pull-right">Add Qustion</button>
            <div class="clearfix"></div>
        </form>
        </div>
      </div>
    </div>

</div>
@endsection

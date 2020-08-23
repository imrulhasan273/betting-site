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
          <h4 class="card-title">Category Modification</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body">
        <form method="POST" action="{{route('admin.auto_stack.cats.update')}}">
        @csrf
        <div class="row">

                <div class="col-md-12" hidden>
                    <div class="form-group">
                    <label class="bmd-label-floating">ID</label>
                    <input name="id" value="{{ $autoStackCategory->id }}" type="text" class="form-control">
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Category Name</label>
                        <input name="cat_name" value="{{ $autoStackCategory->name }}" type="text" class="form-control">
                    </div>
                </div>

        </div>

            <button name="submit" type="submit" class="btn btn-primary pull-right">Update Category</button>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>

</div>
@endsection


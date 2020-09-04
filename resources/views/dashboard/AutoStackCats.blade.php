@php
$active='autoStack';
@endphp
@extends('layouts.backend')
@section('content')
<div class="row">

    <div class="col-md-12">
        <x-alert/>
    </div>

    <div class="col-md-2">
        <a href="{{ route('admin.auto_stack.cats.add') }}" name="add" class="btn btn-primary ">Add Category</a>
    </div>

    <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0">Categories</h4>
          <p style="color: blanchedalmond" class="card-category"> Stack Categories are appearing here</p>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover" id="datatable" style="width:100%">
              <thead class="">
              <tr>
                    <th class="td-actions text-center">
                    ID
                </th>
                <th class="td-actions text-center">
                    Category Name
                </th>
                <th class="td-actions text-center">
                    Stack Option
                </th>
                <th class="td-actions text-center">
                    Action
                </th>
              </tr>
              </thead>
                <tbody>
                     @foreach ($AutoStackCats as $AutoStackCat)
                    <tr style="background: rgb(178, 206, 233); color:rgb(0, 0, 0)">
                        <td class="td-actions text-center">
                            {{$AutoStackCat->id}}
                        </td>
                        <td class="td-actions text-center">
                            {{$AutoStackCat->name}}
                        </td>
                        <td class="td-actions text-center">
                            <a href="{{route('admin.auto_stack.stack_options',[$AutoStackCat->id])}}" type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">ballot</i>
                            </a>
                        </td>
                        <td class="td-actions text-center">
                            <a href="{{route('admin.auto_stack.cats.edit',[$AutoStackCat->id])}}" type="button" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">edit</i>
                            </a>
                            <a href="{{ route('admin.auto_stack.cats.destroy',[$AutoStackCat->id]) }}" type="button" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">close</i>
                            </a>
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

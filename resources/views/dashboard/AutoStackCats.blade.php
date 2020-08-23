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
        <a href="{{route('games.add')}}" name="add" class="btn btn-primary ">Add Category</a>
    </div>

    <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0">Categories</h4>
          <p class="card-category"> All the games appearing here</p>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="">
                <th class="td-actions text-center">
                    ID
                </th>
                <th class="td-actions text-center">
                    Name
                </th>
                <th class="td-actions text-center">
                    Stack Option
                </th>
                <th class="td-actions text-center">
                    Action
                </th>
              </thead>
              @foreach ($AutoStackCats as $AutoStackCat)
                <tbody>
                    <tr style="background: rgb(178, 206, 233)">
                        <td class="td-actions text-center">
                            {{$AutoStackCat->id}}
                        </td>
                        <td class="td-actions text-center">
                            {{-- {{$AutoStackCat->name}} --}}
                        </td>
                        <td class="td-actions text-center">
                            <a href="" type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">gavel</i>
                            </a>
                        </td>
                        <td class="td-actions text-center">
                            <a href="" type="button" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">edit</i>
                            </a>
                            <a href="" type="button" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">close</i>
                            </a>
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

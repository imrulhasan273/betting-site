@php
    $active="rule"
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
            <x-alert/>

            @if($rules->count() < 1 )
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Rules</h4>
                  <p class="card-category">Add Website Rules</p>
                </div>
                <div class="card-body">
                 <form action="{{route('admin.rule.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <textarea name="rule_description" class="ckeditor form-control"></textarea>
                    </div>

                <div class="form-group">
                    <button class="btn btn-primary">Add Rules</button>
                </div>
             </form>
          </div>
      </div>
        @else
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Update Rules</h4>
                  <p class="card-category">Update Website Rules</p>
                </div>

                @foreach($rules as $rule)

                <div class="card-body">
                 <form action="{{ route('admin.rule.update',$rule->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <textarea name="rule_description" class="ckeditor form-control">{!! $rule->rule_description !!}</textarea>
                    </div>
                <div class="form-group">
                    <button class="btn btn-primary pull-right">Update Rules</button>
                </div>
                @endforeach
             </form>
             @endif
          </div>
      </div>

    </div>
</div>

<script>
@endsection

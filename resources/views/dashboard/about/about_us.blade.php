@php
    $active="about"
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

            @if($abouts->count() < 1 )
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">About US</h4>
                  <p class="card-category">Company Details</p>
                </div>
                <div class="card-body">
                 <form action="{{route('admin.about.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <textarea name="about_description" class="ckeditor form-control"></textarea>
                    </div>

                <div class="form-group">
                    <button class="btn btn-primary">Add About US</button>
                </div>
             </form>
          </div>
      </div>
        @else
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Update About US</h4>
                  <p class="card-category">Update Company Details</p>
                </div>

                @foreach($abouts as $about)

                <div class="card-body">
                 <form action="{{ route('admin.about.update',$about->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <textarea name="about_description" class="ckeditor form-control">{!! $about->about_description !!}</textarea>
                    </div>
                <div class="form-group">
                    <button class="btn btn-primary pull-right">Update About US</button>
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

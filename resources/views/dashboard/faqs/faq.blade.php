@php
    $active="faq"
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

            @if($faqs->count() < 1 )
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">FAQ</h4>
                  <p class="card-category">Frequenty asked Questions</p>
                </div>
                <div class="card-body">
                 <form action="{{route('admin.faq.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <textarea name="faq_description" class="ckeditor form-control"></textarea>
                    </div>

                <div class="form-group">
                    <button class="btn btn-primary">Add FAQ</button>
                </div>
             </form>
          </div>
      </div>
        @else
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Update FAQ</h4>
                  <p class="card-category">Update Frequenty asked Questions</p>
                </div>

                @foreach($faqs as $faq)

                <div class="card-body">
                 <form action="{{ route('admin.faq.update',$faq->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <textarea name="faq_description" class="ckeditor form-control">{!! $faq->faq_description !!}</textarea>
                    </div>
                <div class="form-group">
                    <button class="btn btn-primary pull-right">Update FAQ</button>
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

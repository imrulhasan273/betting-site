@php
    $active="settings"
@endphp
@extends('layouts.backend')
@section('content')

     <div class="row">

        <div class="col-md-12">

            @if($notices->count() < 1 )
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Notice for user</h4>
                  <p class="card-category"> Sliding news and Pop-up Notice</p>
                </div>

                <div class="card-body">
                 <form action="{{route('admin.notice.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                    <label><strong>Sliding notice</strong></label>
                    <input type="text" name="notice_slide" id="footer" class="form-control">
                    </div>

                    <div class="form-group">
                    <label><strong>Notice Pop-Up</strong></label>
                   <textarea name="notice_pop" id="notice_pop" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                <div class="form-group">
                    <button class="btn btn-primary">Add Notice</button>
                </div>
             </form>
          </div>
      </div>
        @else
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Update Notice</h4>
                  <p class="card-category"> Sliding news and Pop-up Notice</p>
                </div>

                @foreach($notices as $notice)
                <div class="card-body">
                 <form action="{{ route('admin.notice.update',$notice->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                    <label><strong>Sliding notice</strong></label>
                    <input type="text" name="notice_slide" id="footer" class="form-control" value="{{$notice->notice_slide}}">
                    </div>

                    <div class="form-group">
                    <label><strong>Notice Pop-Up</strong></label>
                    <textarea name="notice_pop" id="notice_pop" cols="30" rows="10" class="form-control">{{$notice->notice_pop}}</textarea>
                    </div>

                <div class="form-group">
                    <button class="btn btn-primary">Update Notice</button>
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

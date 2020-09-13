@php
    $active="settings"
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

            @if($settings->count() < 1 )
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Setup your site</h4>
                  <p class="card-category"> Logo,Copy rights and Disclaimer</p>
                </div>

                <div class="card-body">
                 <form action="{{route('admin.setting.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <p><input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" style="display: none;"></p>
                    <p><label for="file" class="btn btn-warning" style="cursor: pointer;">Upload Logo</label></p>
                    <p><img id="output" width="200" /></p>
                    </div>

                    <div class="form-group">
                    <label><strong>Copy Rights</strong></label>
                    <input type="text" name="footer" id="footer" class="form-control">
                    </div>

                    <div class="form-group">
                    <label><strong>Warning Disclaimer</strong></label>
                   <textarea name="warning" id="warning" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                <div class="form-group">
                    <button class="btn btn-primary">Add Settings</button>
                </div>
             </form>
          </div>
      </div>
        @else
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Update Settings</h4>
                  <p class="card-category"> Logo, Copy rights and Disclaimer</p>
                </div>

                @foreach($settings as $setting)
                <div class="card-body">
                 <form action="{{ route('admin.setting.update',$setting->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <p>
                        <input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" style="display: none;">
                    </p>
                    <p>
                        <label for="file" class="btn btn-warning" style="cursor: pointer;">Upload Logo</label>
                    </p>
                    <p>
                        <img id="output" width="200" />
                    </p>
                    <img src="{!! asset('images/setting/'.$setting->image) !!}" width="100">
                    </div>

                    <div class="form-group">
                    <label><strong>Copy Rights</strong></label>
                    <input type="text" name="footer" id="footer" class="form-control" value="{{$setting->footer}}">
                    </div>

                     <div class="form-group">
                    <label><strong>Warning Disclaimer</strong></label>
                   <textarea name="warning" id="warning" cols="30" rows="10" class="form-control"> {{$setting->warning}}</textarea>
                    </div>

                <div class="form-group">
                    <button class="btn btn-primary pull-right">Update Settings</button>
                </div>
                @endforeach
             </form>

             @endif
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

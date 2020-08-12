@php
    $active="settings"
@endphp
@extends('layouts.backend')
@section('content')
<div class="row">
{{-- <h1> if working, row count = {{ $settings->count() }}</h1> --}}
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title ">Setup your site</h4>
            <p class="card-category"> Logo and footer text</p>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.setting.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    {{-- <label>Logo</label> --}}
                    <p>
                        <input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" style="display: none;">
                    </p>
                    <p>
                        <label for="file" class="btn btn-warning" style="cursor: pointer;">Upload Image</label>
                    </p>
                    <p>
                        <img id="output" width="200" />
                    </p>
                    <p>Website Logo.</p>
                </div>

                <div class="form-group">
                    <label>Footer text</label>
                    <textarea name="footer" id="footer" class="form-control" rows="5">
                    </textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Settings</button>
                </div>
            </form>

            {{-- <h1>Else working, row count = {{$settings->count() }}</h1> --}}

                {{-- <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Logo</label>
                        <p><input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)"
                                            style="display: none;"></p>
                        <p><label for="file" class="btn btn-warning" style="cursor: pointer;">Upload Image</label>
                        </p>
                        <p><img id="output" width="200" /></p>

                        <img src="" width="100">

                        <p>Website Logo.</p>
                    </div>


                    <div class="text-right">
                        <span class="btn btn-warning" id="addSocialField"><i class="fa fa-plus"></i></span>
                    </div>
                    <div class="form-group">
                        <label>About US</label>
                        <textarea name="about" id="about" class="form-control"
                                    rows="5">  </textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Update Settings</button>
                    </div>
                </form> --}}

        </div>
    </div>
<script>
    var loadFile = function (event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
@endsection

@php
$active='games';
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
          <h4 class="card-title">Game Addition</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body">

        <form method="POST" action="{{route('games.store')}}" enctype="multipart/form-data">
        @csrf
            <div class="row">

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="bmd-label-floating">Select Game Type</label>
                        <select name="type_id" class="form-control">
                            @foreach ($types as $type)
                                <option style="color: rgb(19, 146, 219)" value="{{$type->id}}">{{$type->display_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-group">
                        <label class="bmd-label-floating">Country 1</label>
                        <input name="c1" value="" type="text" class="form-control">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="bmd-label-floating">Country 2</label>
                        <input name="c2" value="" type="text" class="form-control">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="bmd-label-floating">Game Status</label>
                        <select name="status" class="form-control">
                            <option style="color: rgb(19, 146, 219)" value="live">Live</option>
                            <option style="color: rgb(19, 146, 219)" value="upcoming">Upcoming</option>
                        </select>
                    </div>
                </div>



                {{-- <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">Date</label>
                        <input name="date" value="" type="text" class="form-control">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">Time</label>
                        <input name="time" value="" type="text" class="form-control">
                    </div>
                </div> --}}

                <div class="col-md-4">
                    <label class="bmd-label-floating">Date</label>
                    <input name="date" type="text" class="form-control datepicker" value="2020-01-01">
                </div>

                <div class="col-md-4">
                    <label class="bmd-label-floating">Time</label>
                    <input name="time" type="text" class="form-control timepicker" value="00:00:00">
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">Tournament Name</label>
                        <input name="tournament_name" value="" type="text" class="form-control">
                    </div>
                </div>

            </div>

                <button name="submit" type="submit" class="btn btn-primary pull-right">Add Game</button>

            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>

</div>
@endsection

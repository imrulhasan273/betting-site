@php
    $active="club_message"
@endphp
@extends('layouts.backend')
@section('content')

<div class="col-md-2">
    <a href="{{route('webmessage.club.send')}}" name="club_to_admin" class="btn btn-primary ">Send Message to Admin</a>
</div>

<div class="row">
    <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0">Received Web Messages from Admin</h4>
        </div>

        <div class="card-body">
          <div class="table-responsive">
<table id="datatable" class="table table-striped table-bordered" style="width:100%">
         <thead class="">
             <tr>
                <th>SL.</th>
                <th>Subject</th>
                <th>Sent Message</th>
                <th>Time</th>
                {{-- <th>Action</th> --}}
             </tr>
        </thead>
            {{-- @if($sent_messages_admin->count() > 0 )
                <tbody>
            @foreach ($sent_messages_admin as $key=> $sent_by_admin) --}}
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
              {{-- @endforeach --}}
                </tbody>

              {{-- @endif --}}
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

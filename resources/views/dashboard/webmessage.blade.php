@php
    $active="webmessage"
@endphp
@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0">Received Web Messages</h4>
        </div>

        <div class="card-body">
          <div class="table-responsive">
<table id="datatable" class="table table-striped table-bordered" style="width:100%">
         <thead class="">
             <tr>
                <th>SL.</th>
                {{-- <th>Sender ID</th> --}}
                <th>Sender Name</th>
                <th>Subject</th>
                <th>Sent Message</th>
                <th>Time</th>
                <th>Action</th>
             </tr>
        </thead>
            @if($webmessages->count() > 0 )
                <tbody>
            @foreach ($webmessages as $key=> $webmessage)
            <tr>
                <td>{{ ++$key }}</td>
                {{-- <td>bet#{{ $webmessage->user_id }}</td> --}}
                <td>{{ $webmessage->user_name }}</td>
                <td>{{ $webmessage->user_message_subject }}</td>
                <td>{{ $webmessage->user_sent_message }}</td>
                <td>{{ $webmessage->created_at }}</td>
                <td><a href="{{ route('webmessage.admin.send',$webmessage->user_id) }}"><i class="material-icons">quickreply</i></a></td>
            </tr>
              @endforeach
                </tbody>

              @endif
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

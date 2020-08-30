@php
    $active="sent_webmessage"
@endphp
@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0">Sent Web Messages</h4>
        </div>

        <div class="card-body">
          <div class="table-responsive">
<table id="datatable" class="table table-striped table-bordered" style="width:100%">
         <thead class="">
             <tr>
                <th>SL.</th>
                <th>Receiver</th>
                <th>Subject</th>
                <th>Sent Message</th>
                <th>Time</th>
                {{-- <th>Action</th> --}}
             </tr>
        </thead>
            @if($sent_messages_admin->count() > 0 )
                <tbody>
            @foreach ($sent_messages_admin as $key=> $sent_by_admin)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $sent_by_admin->user_name }}</td>
                <td>{{ $sent_by_admin->admin_message_subject }}</td>
                <td>{{ $sent_by_admin->admin_sent_message }}</td>
                <td>{{ $sent_by_admin->created_at }}</td>
                {{-- <td><a href="{{ route('webmessage.user.get',$webmessage->user_id) }}"><i class="material-icons">quickreply</i></a></td> --}}
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

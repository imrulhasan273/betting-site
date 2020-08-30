@php
    $active="webmessage_club_index"
@endphp
@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0">Received Club Messages</h4>
        </div>

        <div class="card-body">
          <div class="table-responsive">
<table id="datatable" class="table table-striped table-bordered" style="width:100%">
         <thead class="">
             <tr>
                <th>SL.</th>
                {{-- <th>Role</th> --}}
                <th>Sender Name</th>
                <th>Subject</th>
                <th>Sent Message</th>
                <th>Time</th>
                <th>Action</th>
             </tr>
        </thead>
            @if($webmessage_club->count() > 0 )
                <tbody>
            @foreach ($webmessage_club as $key=> $webmessage_club)

            <!-- START ADDED --->
            @php
                $user = App\User::where('id', $webmessage_club->user_id)->first();
                $msgROLE = $user->role[0]->name;
            @endphp
            @if($msgROLE == 'club_admin')
            <!-- END ADDED -->

            <tr>
                <td>{{ ++$key }}</td>
                {{-- <td>{{ $msgROLE }}</td> --}}
                <td>{{ $webmessage_club->user_name }}</td>
                <td>{{ $webmessage_club->user_message_subject }}</td>
                <td>{{ $webmessage_club->user_sent_message }}</td>
                <td>{{ $webmessage_club->created_at }}</td>
                <td><a href="{{ route('webmessage.user.get',$webmessage_club->user_id) }}"><i class="material-icons">quickreply</i></a></td>
            </tr>

            <!-- START ADDED -->
            @endif
            <!-- END ADDED-->

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

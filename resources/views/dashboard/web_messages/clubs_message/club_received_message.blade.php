@php
    $active="club_message"
@endphp
@extends('layouts.backend')
@section('content')

<div class="row">
    <div class="col-md-6">
    <a href="{{route('webmessage.club.send')}}" name="club_to_admin" class="btn btn-success ">Send Message to Admin</a>
</div>
<div class="col-md-6">
    <a style="float: right" href="{{route('webmessage.club.sent.items')}}" name="club_sent_items" class="btn btn-info ">View Sent Items</a>
</div>
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
            @if($received_by_club->count() > 0 )
                <tbody>
            @foreach ($received_by_club as $key=> $webmessage_club)

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
                {{-- <td>{{ $webmessage_club->user_name }}</td> --}}
                <td>{{ $webmessage_club->admin_message_subject }}</td>
                <td>{{ $webmessage_club->admin_sent_message }}</td>
                <td>{{ $webmessage_club->created_at }}</td>
                {{-- <td><a href="{{ route('webmessage.user.get',$webmessage_club->user_id) }}"><i class="material-icons">quickreply</i></a></td> --}}
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

@php
    $active="webmessage_club_index";
    $key=0;
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
                <th>Sender Name</th>
                <th>Subject</th>
                <th>Sent Message</th>
                <th>Time</th>
                <th>Status</th>
                <th>Reply</th>
             </tr>
        </thead>
            @if($webmessages_club->count() > 0 )
                <tbody>
            @foreach ($webmessages_club as $webmessage_club)

            <!-- START ADDED --->
            @php
                $user = App\User::where('id', $webmessage_club->user_id)->first();
                $msgROLE = $user->role[0]->name ?? null;
            @endphp
            @if($msgROLE == 'club_admin')
            <!-- END ADDED -->

            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $webmessage_club->user_name }}</td>
                <td>{{ $webmessage_club->user_message_subject }}</td>
                <td>{{ $webmessage_club->user_sent_message }}</td>
                <td>{{ $webmessage_club->created_at }}</td>
                <td><p>
                  @if ($webmessage_club->is_seen)
                  <button type="button" class="btn btn-success btn-sm">Seen</button>
                  @else
                  <button type="button" class="btn btn-warning btn-sm">Unseen</button>
                  @endif
                </p></td>

                <td><span><a href="{{ route('webmessage.user.get',$webmessage_club->user_id) }}"><i class="material-icons">quickreply</i></a></span></td>
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

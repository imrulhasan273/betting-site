@php
    $active="club_message"
@endphp
@extends('layouts.backend')
@section('content')

<div class="row">
    <div class="col-md-6">
    <a href="{{route('webmessage.club.send')}}" name="club_to_admin" class="btn btn-success ">Send Message to Admin</a>
</div>
</div>

<div class="row">
    <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0">Sent Items</h4>
        </div>

        <div class="card-body">
          <div class="table-responsive">
<table id="datatable" class="table table-striped table-bordered" style="width:100%">
         <thead class="">
             <tr>
                <th>SL.</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Time</th>
                {{-- <th>Action</th> --}}
             </tr>
        </thead>
            @if($club_sent_items->count() > 0 )
                <tbody>
            @foreach ($club_sent_items as $key=> $club_sent_item)

            <!-- START ADDED --->
            @php
                $user = App\User::where('id', $club_sent_item->user_id)->first();
                $msgROLE = $user->role[0]->name;
            @endphp
            @if($msgROLE == 'club_admin')
            <!-- END ADDED -->

            <tr>
                <td>{{ ++$key }}</td>
                {{-- <td>{{ $msgROLE }}</td> --}}
                {{-- <td>{{ $webmessage_club->user_name }}</td> --}}
                <td>{{ $club_sent_item->user_message_subject }}</td>
                <td>{{ $club_sent_item->user_sent_message }}</td>
                <td>{{ $club_sent_item->created_at }}</td>
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

@php
    $active="webmessage"
@endphp
@extends('layouts.backend')
@section('content')

     <div class="row">

        <div class="col-md-12">
            <x-alert/>


              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Send Replay</h4>
                </div>

                <div class="card-body">
                 <form action="{{ route('webmessage.admin.send',$user->user_id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                    <input type="hidden" name="user_name" value="{{ $user->user_name }}">
                    <div class="form-group">
                        <label><strong>Subject</strong></label>
                        <input type="text" name="admin_message_subject" id="admin_message_subject" class="form-control" value="{{ $user->user_message_subject }}">
                    </div>

                    <div class="form-group">
                        <label><strong>Replay for user</strong></label>
                        <textarea name="admin_sent_message" id="admin_sent_message" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                <div class="form-group">
                    <button class="btn btn-primary">Send Replay</button>
                </div>
             </form>
          </div>
      </div>
    </div>
</div>

<script>
@endsection

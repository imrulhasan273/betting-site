@php
    $active="send_to_club"
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
            <x-alert/>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Send Message to Club</h4>
                </div>

                <div class="card-body">
                 <form action="{{ route('webmessage.admin.send.club.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                       <label class="bmd-label-floating"><strong>Select a Club</strong></label>
                    <select name="club_identity" class="selectpicker" data-style="btn btn-primary btn-round">
                      <option disabled selected>Show Clubs</option>

                       @if($clubs->count() > 0 )
                       @foreach ($clubs as $club)
                       <option value="{{ $club->id }}">{{ $club->name }}</option>
                       @endforeach
                      @endif

                    </select>
                    </div>


                    <div class="form-group">
                        <label><strong>Subject</strong></label>
                        <input type="text" name="admin_message_subject" id="admin_message_subject" class="form-control">
                    </div>

                    <div class="form-group">
                        <label><strong>Replay for user</strong></label>
                        <textarea name="admin_sent_message" id="admin_sent_message" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                <div class="form-group">
                    <button class="btn btn-primary">Send Message</button>
                </div>
             </form>
          </div>
      </div>
    </div>
</div>

<script>
@endsection

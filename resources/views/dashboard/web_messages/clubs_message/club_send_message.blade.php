@php
    $active="club_message"
@endphp
@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-6">
        <a href="{{route('webmessage.club.index')}}" name="club_received" class="btn btn-success ">View Received Messages</a>
    </div>
    <div class="col-md-6">
        <a style="float: right" href="{{route('webmessage.club.sent.items')}}" name="club_sent_items" class="btn btn-info ">View Sent Items</a>
    </div>
    </div>
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
                  <h4 class="card-title ">Send Message To admin</h4>
                </div>

                <div class="card-body">
                 <form action="{{ route('webmessage.club.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="club_id" value="{{ Auth::user()->id }}" readonly>
                    <input type="hidden" name="club_name" value="{{ Auth::user()->clubOwner->pluck('name')[0] }}" readonly>
                    {{-- <input type="hidden" name="user_type" value="{{ Auth::user()->role->pluck('name') }}" readonly> --}}

                    <div class="form-group">
                        <label><strong>Subject</strong></label>
                        <input type="text" name="club_message_subject" id="club_message_subject" class="form-control">
                    </div>

                    <div class="form-group">
                        <label><strong>Message Body</strong></label>
                        <textarea name="club_sent_message" id="club_sent_message" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                <div class="form-group">
                    <button class="btn btn-primary">Send</button>
                </div>
             </form>
          </div>
      </div>
    </div>
</div>

<script>
@endsection

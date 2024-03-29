@php
    $sub = $_GET['subject'] ?? null;
@endphp
@extends('layouts.frontend')
@section('content')
<div class="col-md-12">
    <x-alert/>
</div>
<div class="container">

    <div style="padding-top: 10%;padding-bottom: 10%;" class="row justify-content-center">
        <div class="col-md-12">
        <div class="col-md-7 col-md-offset-2">


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
         @if (Auth::user())
          <form class="form-horizontal" action="{{ route('webmessage.send.user') }}" method="post">
              @csrf
          <fieldset style="margin-top: 20px">
            <legend class="text-center">Send Message to Admin</legend>

             <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}" readonly>

            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Name</label>
              <div class="col-md-9">
                <input id="name" name="user_name" type="text" class="form-control" value="{{ Auth::user()->name }}" readonly >
              </div>
            </div>

            <!-- Subject input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="email">Message Subject</label>
                <div class="col-md-9">
                    @if($sub)
                    <input style="color: black" id="subject" value="{{$sub}}" name="user_message_subject" type="text" placeholder="Your Email Subject" class="form-control">
                    @else
                    <input style="color: black" id="subject" name="user_message_subject" type="text" placeholder="Your Email Subject" class="form-control" required>
                    @endif
                </div>
            </div>

            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Your message</label>
              <div class="col-md-9">
                <textarea style="color: black" class="form-control" id="message" name="user_sent_message" placeholder="Please enter your message here..." rows="5" required></textarea>
              </div>
            </div>
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
              </div>
            </div>
          </fieldset>
          </form>
          @endif

          @if (!Auth::user())

          <h1>To send message login first</h1>

              {{-- <form class="form-horizontal" action="{{ route('webmessage.send.user') }}" method="post">
              @csrf
          <fieldset style="margin-top: 20px">
            <legend class="text-center">Send Message to Admin</legend>

             <input type="hidden" id="user_id" name="user_id" value="0" readonly>

            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Name</label>
              <div class="col-md-9">
                <input id="name" name="user_name" type="text" class="form-control" required>
              </div>
            </div>

            <!-- Subject input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="email">Message Subject</label>
                <div class="col-md-9">
                    <input style="color: black" id="subject" name="user_message_subject" type="text" placeholder="Your Subject" class="form-control" required>
                </div>
            </div>

            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Your message</label>
              <div class="col-md-9">
                <textarea style="color: black" class="form-control" id="message" name="user_sent_message" placeholder="Please enter your message here..." rows="5" required></textarea>
              </div>
            </div>
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
              </div>
            </div>
          </fieldset>
          </form> --}}
          @endif
      </div>
        </div>
    </div>
</div>
@endsection


@extends('layouts.frontend')
@section('content')
<div class="container">
    <div style="padding-top: 10%;padding-bottom: 10%;" class="row justify-content-center">
        <div class="col-md-12">
            <div class="col-md-7 col-md-offset-2">
                            <x-alert/>

          <form class="form-horizontal" action="{{ route('webmessage.send.user') }}" method="post">
              @csrf
          <fieldset>
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
                <input id="subject" name="user_message_subject" type="text" placeholder="Your Email Subject" class="form-control">
              </div>
            </div>

            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Your message</label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="user_sent_message" placeholder="Please enter your message here..." rows="5"></textarea>
              </div>
            </div>

            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
              </div>
            </div>
          </fieldset>
          </form>
      </div>
        </div>
    </div>
</div>
@endsection


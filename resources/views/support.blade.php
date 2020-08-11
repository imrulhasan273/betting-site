@extends('layouts.frontend')
@section('content')
<!-- Start Content -->
<div class="container" style="background: #fff;margin-top: 50px;min-height: 400px;">
    <h2>All Tickets</h2>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">New Ticket</a></li>
        <li><a data-toggle="tab" href="#menu1">Active Ticket</a></li>
        <li><a data-toggle="tab" href="#menu2">Old Ticket</a></li>

    </ul>
    <br>
    <div class="tab-content">


        <div class="alert " id="hide">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="material-icons">close</i>
            </button>
            <span>
                <b></b>

                <b id="ticket-message"></b>

            </span>
        </div>


        <div id="home" class="tab-pane fade in active">
            <form class="form-group">

                <label for="subject">Subject</label>

                <input type="text" name="subject" id="ticket_subject" value="" placeholder="" class="form-control" style="max-width: 400px;">
                <label for="description">Description</label>

                <textarea name="ticket_message" class="form-control" id="ticket_message" rows="8" cols="200" style="max-width: 400px;"></textarea>
                <br>
                <button type="button" class="btn btn-primary" id="ticketsubmit">Send</button>
            </form>
        </div>
        <div id="menu1" class="tab-pane fade">
            <div id="chatbox" style="max-height: 400px;overflow-y: scroll;max-width: 800px;">

            </div>

            <form class="form-group">

                <label for="description">Message</label>

                <textarea name="ticket_message" class="form-control" id="reply_message" rows="4" cols="200" style="max-width: 400px;"></textarea>
                <br>
                <button type="button" class="btn btn-primary" id="reply_submit">Send</button>
            </form>

        </div>
        <div id="menu2" class="tab-pane fade">
        </div>

    </div>
</div>

<script type="79fbbfdbab499e5a89b37efe-text/javascript">
    $(document).ready(function() {

    });
</script>
<!-- End Content -->
@endsection

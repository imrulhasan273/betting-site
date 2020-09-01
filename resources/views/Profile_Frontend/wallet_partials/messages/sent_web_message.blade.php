@extends('layouts.frontend')
@section('content')
<div class="container">
    <div style="padding-top: 10%;padding-bottom: 10%;" class="row justify-content-center">
        <div class="col-md-12">
             <table class="table table-bordered table-hover" id="sampleTable1">
                <thead>
                    <tr>
                    <th>SL.</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user_sent_items as $key=> $message)

                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $message->user_message_subject }}</td>
                        <td>{{ $message->user_sent_message }}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
 </div>
</div>
@endsection


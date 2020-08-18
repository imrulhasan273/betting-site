@extends('layouts.frontend')
@section('content')
<div class="container">
    <div style="padding-top: 10%;padding-bottom: 10%;" class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                    {{-- <th scope="col">User ID</th> --}}
                    <th scope="col">Subject</th>
                    <th scope="col">Message</th>
                    <th scope="col">Reply</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                    @can('view', $message)
                    <tr>
                        {{-- <td>{{ $message->user_id }}</td> --}}
                        <td>{{ $message->admin_message_subject }}</td>
                        <td>{{ $message->admin_sent_message }}</td>
                        @php
                            $sub ='subject='.$message->admin_message_subject;
                        @endphp
                        <td><a href="{{ route('webmessage.index.user',$sub) }}">Reply</a></td>
                    </tr>
                    @endcan
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


@php
    $active="sent_message"
@endphp
@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-md-2">
    </div>

    <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0">All Sent Message</h4>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="">
                <th>
                    ID
                </th>
                <th>
                    Phone Number
                </th>
                <th>
                    Sent Message
                </th>
              </thead>

            @if($messages->count() > 0 )
              @foreach ($messages as $message)

                <tbody>
                    <tr>
                        <td>
                            {{$message->id}}
                        </td>
                        <td>
                            {{$message->user_no}}
                        </td>
                        <td>
                            {{$message->user_message}}
                        </td>
                    </tr>
                </tbody>

              @endforeach
              @endif
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

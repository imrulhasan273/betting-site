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
<table id="datatable" class="table table-striped table-bordered" style="width:100%">
         <thead class="">
             <tr>
                <th>ID</th>
                <th>Number</th>
                <th>Message</th>
             </tr>
        </thead>
            @if($messages->count() > 0 )
            @php

            @endphp

                <tbody>
            @foreach ($messages as $key=> $message)

            <tr>
                <td>{{ ++$key }}</td>
                <td>+880{{ $message->user_no }}</td>
                <td>{{ $message->user_message }}</td>
            </tr>
              @endforeach
                </tbody>
              <tfoot>
                  <tr>
                <th>ID</th>
                <th>Number</th>
                <th>Message</th>
             </tr>
              </tfoot>
              @endif
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

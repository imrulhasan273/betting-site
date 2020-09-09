@php
    $active="message"
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
                  <h4 class="card-title ">Send Message</h4>
                  <p class="card-category">Withdraw, Deposit or any message</p>
                </div>

                <div class="card-body">
                 <form action="{{route('admin.message.send')}}" method="POST">
                    @csrf

                    <div class="form-group">
                    <label><strong>Phone Number</strong></label>
                    <input type="text" name="user_no" id="user_no" class="form-control" placeholder="017123456789">
                    </div>

                    <div class="form-group">
                    <label><strong>Message for user</strong></label>
                   <textarea name="user_message" id="user_message" cols="30" rows="10" class="form-control"></textarea>
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

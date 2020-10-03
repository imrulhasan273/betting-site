@extends('layouts.frontend')
@section('content')
<div class="container p-0 " style="background: #4267B2;padding-top: 10%; margin-top:18px">
    <div class="col-lg-12">
        <!-- flight section -->
        <div class="" style="max-width: 300px;margin:0 auto">
            <div style="width:127px;margin:0 auto;">
                <img src="{{asset('frontend/img/profile.png')}}">
                <p style="color: #fff;text-align: center;">{{$user->name}}</p>
            </div>
            <div style="width: 300px;
                        margin: 0 auto;
                        height: 200px;
                        box-shadow: 0px 0px 23px -5px #fff;
                        margin-top: 15px;
                        margin-bottom: 20px;
                        border-radius: 16px;">
                <div style="width:100%;padding: 20px;color: #fff;    line-height: 34px;">
                    <table>
                        <tbody>
                            <tr>
                                <td>Email </td>
                                <td> {{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>User Name </td>
                                <td>{{ $user->user_name }}</del></td>
                            </tr>
                            <tr>
                                <td style="min-width: 91px">Mobile No </td>
                                <td> {{ $user->phone }}</td>
                            </tr>
                            <tr>
                            @php
                            $clubName = App\Club::where('id', $user->club_id)->pluck('name');
                            $clubName = $clubName[0] ?? null;
                            @endphp
                                <td>Club </td>
                                <td> {{ $clubName }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

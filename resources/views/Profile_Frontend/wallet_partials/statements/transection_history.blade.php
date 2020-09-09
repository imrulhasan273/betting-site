@php
$AuthuserName = App\User::where('id', Auth::user()->id)->pluck('user_name');
$AuthuserName = $AuthuserName[0];

$trHistories = DB::table('user_transection')
                ->where('user_id', Auth::user()->id)
                ->get();
$sl=0;
@endphp
<div class="bhoechie-tab-content ">
    <center>
        <div class="">
            <div class="row">
                <div class="col-xs-12">
                    <div class="tile">
                        <div class="tile-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="sampleTable4">
                                    <thead>
                                        <tr>
                                            <th scope="col">SN.</th>
                                            <th scope="col">User ID</th>
                                            <th scope="col">With</th>
                                            <th scope="col">Debit (Out)</th>
                                            <th scope="col" class="text-center">Credit (In)</th>
                                            <th scope="col">Description</th>
                                            <th scope="col" class="text-center">Balance</th>
                                            <th scope="col">Date &amp; Time</th>
                                        </tr>
                                    </thead>
                                    @foreach($trHistories as $trHistory)
                                    @php
                                        $withName = App\User::where('id', $trHistory->from_id)->pluck('user_name');
                                        $withName = $withName[0] ?? null;
                                    @endphp
                                    <tbody>
                                        <tr>
                                            <th scope="col">sl</th>
                                            <th scope="col">{{$AuthuserName}}</th>
                                            <th scope="col">{{$withName}}</th>
                                            <th scope="col">{{$trHistory->debit}}</th>
                                            <th scope="col">{{$trHistory->credit}}</th>
                                            <th scope="col" class="text-center">{{$trHistory->description}}</th>
                                            <th scope="col" class="text-center">{{$trHistory->balance}}</th>
                                            <th scope="col">{{$trHistory->created_at}}</th>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div><!--end of .table-responsive-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
</div>
</div>

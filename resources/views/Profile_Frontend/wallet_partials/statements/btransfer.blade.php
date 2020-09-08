
@php
$AuthuserName = App\User::where('id', Auth::user()->id)->pluck('user_name');
                    $AuthuserName = $AuthuserName[0];
$btransfers = DB::table('balance_transfer')
                ->where('from', $AuthuserName)
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
                                <table class="table table-hover table-bordered" id="sampleTable3">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">Sn</th>
                                            <th scope="col">From User</th>
                                            <th scope="col">To User</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Notes</th>
                                            <th scope="col">Time</th>
                                        </tr>
                                    </thead>
                                    @foreach($btransfers as $btransfer)
                                    <tbody>
                                        <tr>
                                            <th scope="col" class="text-center">{{++$sl}}</th>
                                            <th scope="col">{{ $btransfer->from }}</th>
                                            <th scope="col">{{ $btransfer->to }}</th>
                                            <th scope="col">{{ $btransfer->amount }}</th>
                                            <th scope="col">{{ $btransfer->note }}</th>
                                            <th scope="col">{{ $btransfer->created_at }}</th>
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
<div class="col-lg-12  bhoechie-tab">

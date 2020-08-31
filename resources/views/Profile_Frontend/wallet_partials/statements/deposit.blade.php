@php
     $deposits = App\Deposit::where('user_id', Auth::user()->id)->get();
@endphp
<div class="col-lg-12  bhoechie-tab">
    <div class="bhoechie-tab-content ">
        <center>
            <div class="">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="sampleTable1">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Sn</th>
                                        <th scope="col" class="text-center">From</th>
                                        <th scope="col" class="text-center">To</th>
                                        <th scope="col" class="text-center">Method</th>
                                        <th scope="col" class="text-center">Amount</th>
                                        <th scope="col" class="text-center">TrXID</th>
                                        <th scope="col" class="text-center">Notes</th>
                                        <th scope="col" class="text-center">Status</th>
                                        {{-- <th scope="col" class="text-center">Action</th> --}}
                                    </tr>
                                </thead>
                                @foreach($deposits as $deposit)
                                <tbody>
                                    <tr>
                                        <td>
                                            SL
                                        </td>

                                        <td>
                                            {{$deposit->deposit_by}}
                                        </td>
                                        <th>
                                            {{$deposit->deposit_to}}
                                        </th>
                                        <td>
                                            {{$deposit->method->method}}
                                        </td>
                                        <th>
                                            {{$deposit->amount}}
                                        </th>

                                        <td>
                                            {{$deposit->transection_id}}
                                        </td>
                                        <td>
                                            {{$deposit->note}}
                                        </td>
                                        <td>
                                            {{$deposit->status}}
                                        </td>
                                        {{-- <td class="td-actions text-center">

                                        </td> --}}
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div><!--end of .table-responsive-->
                    </div>
                </div>
            </div>
        </center>
    </div>
</div>
<div class="col-lg-12  bhoechie-tab">

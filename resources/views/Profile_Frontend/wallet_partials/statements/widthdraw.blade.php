@php
    $widthdraws = App\Widthdraw::where('user_role', 'user')
                                ->where('user_id', Auth::user()->id)->get();
@endphp
<div class="bhoechie-tab-content">
    <center>
        <div class="">
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="sampleTable2">
                            <thead class="">
                                <th>
                                    ID
                                </th>
                                <th>
                                    User
                                </th>
                                <th>
                                    method
                                </th>
                                <th>
                                    method type
                                </th>
                                <th>
                                    Amount
                                </th>
                                <th>
                                    Widthdraw To
                                </th>
                                <th>
                                    Note
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Cancel
                                </th>
                              </thead>
                              @foreach ($widthdraws as $widthdraw)
                                <tbody>
                                    <tr>
                                        <td>
                                            {{$widthdraw->id}}
                                        </td>
                                        <td>
                                            {{$widthdraw->user_id}}
                                        </td>
                                        <td>
                                            {{$widthdraw->method}}
                                        </td>
                                        <th>
                                            {{$widthdraw->method_type}}
                                        </th>
                                        <th>
                                            {{$widthdraw->amount}}
                                        </th>
                                        <td>
                                            {{$widthdraw->widthdraw_to}}
                                        </td>
                                        <td>
                                            {{$widthdraw->note}}
                                        </td>
                                        <td>
                                            {{$widthdraw->status}}
                                        </td>

                                        <td class="td-actions text-center">
                                            @if($widthdraw->status != 'cancel')
                                            <a href="{{ route('widthdraws.statusChangeByUser',[$widthdraw->id,2])}}" type="button" rel="tooltip" class="btn btn-success">
                                                <i class="material-icons">cancel</i>
                                            </a>
                                            @else
                                            <a type="button" rel="tooltip" class="btn btn-success">
                                                <i class="material-icons">cancel</i>
                                            </a>
                                            @endif
                                        </td>
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


<!-------deposit modal--------->
<!--Start Modal deposit -->
@php
    $paymentsOptions = App\PaymentOption::all();
@endphp
<div id="deposit" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header m-head" style="  background:#FF7118">
                <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">&times;</button>
                <h4 class="modal-title" style="color: white;"> &nbsp; Request a deposit <span><button class="btn btn-success" id="show_deposit_notice">Tap for Deposit Notice</button></span></h4>
            </div>

            <div class="modal-body" style="padding: 2% !important">
                <div class="">
                    <div role="form" class="register-form">
                        <div id="deposit_notice" style="text-align: center;background: #123;color:#fff;padding: 10px;" id="">
                            <p>Deposite Time 10am To 10pm &amp; Any Amount. Cash in Minimum 5000. Thanks to staying with us.&nbsp; &nbsp;&nbsp;</p>
                        </div>
                        <img src="frontend/img/loader.gif" style="width:60px;" id="deposit_load">
                        <div id="errorDeposit" class="alert" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            ×</button> <strong id="alertDeposit"> </strong><span id="signuperrorText"></span>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label style="text-align: left;width: 100%;">Method<span style="color:#03ad75;"></span></label>
                                    <select class="form-control" id="dMethodt">
                                    @foreach ($paymentsOptions as $paymentsOption)
                                    {{-- <option disabled selected value>Select method</option> --}}
                                    <option value="{{$paymentsOption->id}}">{{$paymentsOption->method}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label style="text-align: left;width: 100%;">To <span style="color:#DD4F43;"></span></label>
                                    <select class="form-control" id="dTo">
                                    {{-- <option disabled selected value>Select number</option> --}}
                                    {{-- <option id="numA"> 01409-385876 BK </option> --}}
                                    <option value="0" disabled="true" selected="true">Select</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">

                                <div class="form-group">
                                    <label style="text-align: left;width: 100%;">Amount <span style="color:#07000a;"></span></label>
                                    <input type="text" name="first_name" id="dAmount" class="form-control input-lg" placeholder="Amount" tabindex="1">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <label style="text-align: left;width: 100%;">From <span style="color:#07000a;"></span></label>
                                <div class="form-group">
                                    <input type="text" name="dFrom" id="dFrom" class="form-control input-lg" placeholder="From" tabindex="1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6"><input type="submit" id="depositSubmit" value="Submit" class="btn  btn-block btn-lg" tabindex="7" style="  background:#FFC22C;color: #fff"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Modal deposit -->

<!-- START SCRIPTS FOR DEPOSIT -->
@include('home.partials_home.partials.deposit_script')
<!-- END SCRIPTS FOR DEPOSIT -->


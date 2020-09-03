<!-------deposit modal--------->
<!--Start Modal deposit -->
<div id="widthdraw" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header m-head" style="  background:#FF7118">
                <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">&times;</button>
                <h4 class="modal-title" style="color: white;"> &nbsp; Request a widthdraw <span><button class="btn btn-success" id="show_deposit_notice">Tap for Widthdraw Notice</button></span></h4>
            </div>

            <div class="modal-body" style="padding: 2% !important">
                <div class="">
                    <div role="form" class="register-form">
                        <img src="frontend/img/loader.gif" style="width:60px;" id="widthdraw_load">
                        <div id="errorWidthdraw" class="alert" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            ×</button> <strong id="alertWidthdraw"> </strong><span id="signuperrorText"></span>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label style="text-align: left;width: 100%;">Method<span style="color:#03ad75;"></span></label>
                                    <select name="Wmethod" class="form-control" id="Wmethod">
                                    <option value="">Select</option>
                                    <option value="bkash">Bkash</option>
                                    <option value="rocket">Rocket</option>
                                    <option value="nogod">Nogod</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label style="text-align: left;width: 100%;">Type<span style="color:#03ad75;"></span></label>
                                    <select name="Wtype" class="form-control" id="Wtype">
                                    <option value="">Select</option>
                                    <option value="personal">Personal</option>
                                    <option value="agent">Agent</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label style="text-align: left;width: 100%;">To <span style="color:#DD4F43;"></span></label>
                                    <input type="text" name="Wto" id="Wto" class="form-control input-lg" placeholder="Sent To" tabindex="1">
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label style="text-align: left;width: 100%;">Amount <span style="color:#07000a;"></span></label>
                                    <input type="text" name="Wamount" id="Wamount" class="form-control input-lg" placeholder="Amount" tabindex="1">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6"><input type="submit" id="widthdrawSubmit" value="Submit" class="btn  btn-block btn-lg" tabindex="7" style="  background:#FFC22C;color: #fff"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Modal deposit -->

<!-- START SCRIPTS FOR DEPOSIT -->
@include('home.partials_home.partials.widthdraw_script')
<!-- END SCRIPTS FOR DEPOSIT -->


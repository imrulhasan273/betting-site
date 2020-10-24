<!-------deposit modal--------->
<!--Start Modal deposit -->
@php
    $paymentsOptions = App\PaymentOption::all();
@endphp
<div id="changeBet" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header m-head" style="  background:#4267B2">
                <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">&times;</button>
                <h4 class="modal-title" style="color: white;"> &nbsp; Change Bet Rate</h4>
            </div>

            <div class="modal-body" style="padding: 2% !important">
                <div class="">
                    <div role="form" class="register-form">

                        <div class="row">
                            <div class="col-md-6 col-md-6 col-md-6; text-align: right;">
                                <div class="form-group">
                                    <label style="text-align: center;width: 100%;color:#07000a;">New Bet Rate</label>
                                    <input style="text-align: center;width: 100%;" type="text" name="change_bet_rate" id="change_bet_rate" class="form-control input-md" placeholder="Bet Rate" tabindex="1">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6"><input type="submit" id="changeBetSubmit" value="Update" class="btn  btn-block btn-md" tabindex="7" style="  background:#078d34;color: #fff"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Modal deposit -->

<!-- START SCRIPTS FOR DEPOSIT -->
@include('dashboard.games.betting_options.changeBet_script')
<!-- END SCRIPTS FOR DEPOSIT -->

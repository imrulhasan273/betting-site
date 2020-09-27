<!-- =======================START BETTING ON ANSWERS-===================== -->
<!--Start place bet-->

<div style="color:black" class="modal fade betForm" id="betting" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content m-content">
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <div class="modal-header m-head" style="  background: #4267B2 !important;">
                    </div>
                    <div class="modal-body" style="padding: 2% !important">
                        <div class="signup-form">
                            <div id="formData">
                                <div id="errorBet" class="alert" role="alert">
                                    <button type="button" class="close" data-dismiss="" aria-hidden="true">
                                    ×</button> <strong id="alertBet"></strong> <span id="errorchangeClubText"></span>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                    <div class="col-lg-12">
                                        <br>
                                        <div style="width:10%;float:left;">
                                        <label class="gameLogo">
                                            <img id="gameLogo"
                                            style="box-shadow: 1px 7px 4px 0px #111798 !important;border-radius: 50%;"
                                            class="img-circle"
                                            src="" width="25px;">&nbsp;
                                        </label>
                                        </div>
                                        <div style="width:90%;float:left;">
                                        <label>
                                            <span class="bettingTitle" id="bettingTitle">
                                                A vs B | ICC | date | time
                                            </span>
                                            <span class="gameLiveOrUpcoming badge text-right" style="background: rgb(249, 220, 28);">
                                                status
                                            </span>
                                        </label>
                                        </div>
                                        <br>
                                        <label style="padding: 5px 10%;">
                                            <small id="bettingSubTitle">
                                                question
                                            </small>
                                        </label>

                                        <br>

                                        <label style="padding: 5px 10%;">
                                            <span id="BettingSubTitleOption">
                                               answer
                                            </span>
                                            <span id="betRateShow" class="badge text-right">
                                                bet_rate
                                            </span>
                                        </label>
                                        <br>
                                        <input type="text" id="gameID" value="" hidden="1">
                                        <input type="text" id="quesID" value="" hidden="1">
                                        <input type="text" id="ansID" value="" hidden="1">
                                    </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row" style="padding:0px 10%;">
                                        <div class="col-lg-12">
                                            <button class="placebetbutton" id="200">200</button>
                                            <button class="placebetbutton" id="500">500</button>
                                            <button class="placebetbutton" id="1000">1000</button>
                                            <button class="placebetbutton" id="3000">3000</button>
                                            <button class="placebetbutton" id="5000">5000</button>
                                        </div>
                                    </div>
                                    <div class="row" style="padding: 10px 10%;">
                                    <div class="col-lg-12 col-xs-12" style="margin-bottom: 10px;;">
                                        <input type="number" class="form-control" id="stakeAmount" value="100">
                                    </div>
                                    <!-- Start Total Stack -->
                                    <div class="col-lg-7 col-xs-7">
                                        <label style="font-size: 18px;"><strong>Total Stake</strong></label>
                                    </div>
                                    <!-- End Total Stack -->

                                    <div class="col-lg-5 col-xs-5">
                                        <label class="col-lg-12 text-right" style="float: right;"><strong id="stakeAmountView">100</strong></label>
                                    </div>

                                    </div>
                                    <div class="row" style="padding: 0px 10%;">
                                    <div class="col-lg-7 col-xs-7">
                                        <label style="font-size: 18px;"><strong>Possible Winning</strong></label>
                                    </div>

                                    <div class="col-lg-5 col-xs-5">
                                        <label class="col-lg-12 text-right" style="float: right;"><strong id="possibleAmount">192.00</strong></label>
                                    </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" id="placeBet" name="placeBet" class="btn btn-info btn-lg btn-block" style="background: #FFC22C;">Place Bet</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" style="">Close/Back </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="bet_slip" class="tab-pane fade">
                </div>
            </div>
        </div>
    </div>
</div>
<!--End place bet-->

<!-- SCRIPTS FOR THAT MODAL -->
@include('home.partials_home.bet_script')



    <!--------ALLL MODAL --->

    <div class="modal fade" id="sponsor" role="dialog">
        <div class="modal-dialog  modal-lg">
          <!-- Modal content-->
          <div class="modal-content m-content">
            <div class="modal-header m-head" style="  background: #FF7118 !important;">
              <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">×</button>
              <h4 class="modal-title" style="color: #C0C0C0"> &nbsp; All Sponsor's</h4>
            </div>
            <div class="modal-body" style="">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="sampleTable2">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Name</th>
                      <th>User Id</th>
                      <th>Email</th>
                      <th>Phone</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <!--end of .table-responsive-->
            </div>
          </div>
        </div>
    </div>

      <!--Start place bet-->
      <div class="modal fade betForm" id="betting" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content m-content">
            <div class="tab-content">
              <div id="home" class="tab-pane fade in active">
                <div class="modal-header m-head" style="  background: #FF7118 !important;">
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
                                <img id="gameLogo" style="box-shadow: 1px 7px 4px 0px #111798 !important;border-radius: 50%;" class="img-circle" src="./Leading Sports Bet site in Bangladesh_files/ka-pl.png" width="25px;">&nbsp;
                              </label>
                            </div>
                            <div style="width:90%;float:left;">
                              <label>
                                <span id="bettingTitle">Southern W vs Lughborough W &lt;&gt; Womens Cricket Super League &lt;&gt; 01 sep 2019 05:00 pm</span>
                                <span id="gameLiveOrUpcoming" class="badge text-right" style="background: rgb(249, 220, 28);">Live</span>
                              </label>
                            </div>
                            <br>
                            <label style="padding: 5px 10%;"><small id="bettingSubTitle">Toss Winner...? </small></label><br>
                            <label style="padding: 5px 10%;"><span id="BettingSubTitleOption">Lughborough w</span> <span id="betRateShow" class="badge text-right">1.92</span></label> <br>
                            <input type="text" id="match" value="" hidden="1">
                            <input type="text" id="matchBet" value="" hidden="1">
                            <input type="text" id="betRate" value="" hidden="1">
                            <input type="text" id="betId" value="" hidden="1">
                            <input type="text" id="matchId" value="" hidden="1">
                            <input type="text" id="betTitleId" value="" hidden="1">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row" style="    padding:0px 10%;">
                          <div class="col-lg-12">
                            <button class="placebetbutton" id="200">200</button><button class="placebetbutton" id="500">500</button><button class="placebetbutton" id="1000">1000</button>
                            <button class="placebetbutton" id="3000">3000</button><button class="placebetbutton" id="5000">5000</button></div>
                        </div>
                        <div class="row" style="padding: 10px 10%;">
                          <div class="col-lg-12 col-xs-12" style="margin-bottom: 10px;;">
                            <input type="number" class="form-control" id="stakeAmount" value="100">
                          </div>
                          <div class="col-lg-7 col-xs-7">
                            <label style="font-size: 18px;"><strong>Total Stake</strong></label>
                          </div>
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


      <!--Start place bet oneten-->
      <div class="modal fade betForm" id="betting_oneten" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content m-content">
            <div class="modal-header m-head" style="  background: #FF7118 !important;">
              <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">×</button>
              <h4 class="modal-title" style="color: #D2D2D2;font-size: 23px;font-weight: 600;"> &nbsp; Place Bet</h4>
            </div>
            <div class="modal-body" style="padding: 2% !important">
              <div class="signup-form">
                <div id="formData">
                  <div id="errorBetoneten" class="alert" role="alert">
                    <button type="button" class="close" data-dismiss="" aria-hidden="true">
                      ×</button> <strong id="alertBetoneten"></strong> <span id="errorchangeClubText"></span>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-12">
                        <br>
                        <div style="width:10%;float:left;">
                          <label class="gameLogo">
                            <img id="gameLogo" style="box-shadow: 1px 7px 4px 0px #111781 !important;border-radius: 50%;" class="img-circle" src="frontend/img/oneten.gif" width="25px;">&nbsp;
                          </label>
                        </div>
                        <div style="width:90%;float:left;">
                          <label>
                            <span id="bettingTitle">One Ten Game</span>
                            <span id="gameLiveOrUpcoming" class="badge text-right" style="background: rgb(249, 220, 28);">Live</span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="padding: 10px 10%;">
                    <div class="col-lg-7 col-xs-7">
                      <label style="font-size: 18px;"><strong>Your Option</strong></label>
                    </div>
                    <div class="col-lg-5 col-xs-5">
                      <button class="btn btn-default" style="background:#123;
                                                            color: #fff;
                                                            font-size: 22px;
                                                            margin-left: 5px;
                                                            width: 50px;
                                                            height: 50px;
                                                            font-weight: bold;
                                                            margin-top: -9px;min-width:50px;float:right;" id="select_option">1</button>


                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row" style="    padding:0px 10%;">
                      <div class="col-lg-12">
                        <button class="placebetbutton" id="200a">200</button><button class="placebetbutton" id="500a">500</button><button class="placebetbutton" id="1000a">1000</button>
                        <button class="placebetbutton" id="3000a">3000</button><button class="placebetbutton" id="5000a">5000</button></div>
                    </div>
                    <div class="row" style="padding: 10px 10%;">
                      <div class="col-lg-12 col-xs-12" style="margin-bottom: 10px;;">
                        <input type="number" class="form-control" id="stakeAmountoneten" value="100">
                      </div>
                      <div class="col-lg-7 col-xs-7">
                        <label style="font-size: 18px;"><strong>Total Stake</strong></label>
                      </div>
                      <div class="col-lg-5 col-xs-5">
                        <label class="col-lg-12 text-right" style="float: right;"><strong id="onetentotalstake">100</strong></label>
                      </div>
                    </div>
                    <div class="row" style="padding: 0px 10%;">
                      <div class="col-lg-7 col-xs-8">
                        <label style="font-size: 15px;"><strong>Possible Winning...3X</strong></label>
                      </div>
                      <div class="col-lg-5 col-xs-4">
                        <label class="col-lg-12 text-right" style="float: right;"><strong id="possibleAmount1">300</strong></label>
                      </div>
                      <div class="col-lg-7 col-xs-8">
                        <label style="font-size: 15px;"><strong>Possible Winning...2.5X</strong></label>
                      </div>
                      <div class="col-lg-5 col-xs-4">
                        <label class="col-lg-12 text-right" style="float: right;"><strong id="possibleAmount2">250</strong></label>
                      </div>
                      <div class="col-lg-7 col-xs-8">
                        <label style="font-size: 15px;"><strong>Possible Winning...2X</strong></label>
                      </div>
                      <div class="col-lg-5 col-xs-4">
                        <label class="col-lg-12 text-right" style="float: right;"><strong id="possibleAmount3">200</strong></label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" id="oneten_placebet" name="placeBet" class="btn btn-info btn-lg btn-block" style="background: #FFC22C;">Place Bet</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--End place bet oneten-->


      <!--Start Modal withdraw -->
      <div id="withdraw" class="modal fade" role="dialog">
        <div class="modal-dialog  ">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header m-head" style="  background: #FF7118  ">
              <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">&times;</button>
              <h4 class="modal-title" style="color: white;"> &nbsp;Request a withdraw <span><button class="btn btn-success" id="show_withdraw_notice">Tap for Withdraw Notice</button></span></h4>
            </div>
            <div class="modal-body" style="padding: 2% !important">
              <div class="">
                <div role="form" class="register-form">
                  <div id="withdraw_notice" style="text-align: center;background: #123;color:#fff;padding: 10px;" id="">
                    <p>Withdraw limit&nbsp;(500 To 5,000)Tk</p>
                    <p>&amp; Time (11 Pm To 10am)</p>
                  </div>
                  <img src="frontend/img/loader.gif" style="width:60px;" id="withdraw_load">
                  <div id="errorWithdraw" class="alert" role="alert">
                    <button type="button" class="close" data-dismiss="" aria-hidden="true">
                      ×</button> <strong id="alertWithdraw"></strong> <span id="errorWithrawText"></span>
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                      <div class="form-group">
                        <label style="text-align: left;width: 100%;">Amount <span style="color:#DD4F43;"></span></label>
                        <input type="text" name="first_name" id="wAmount" class="form-control input-lg" placeholder="Amount" tabindex="1">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6"><input type="submit" id="withdrawSubmit" value="Submit" class="btn   btn-block btn-lg" tabindex="7" style="  background:#FFC22C;color: #fff"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--End Modal withdraw -->



      <!----------Start Modal User to User balance Transfer------------->
      <div id="balanceTransfer" class="modal fade" role="dialog">
        <div class="modal-dialog  ">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header m-head" style="  background: #FF7118 !important;">
              <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">&times;</button>
              <h4 class="modal-title" style="color: white;"> &nbsp; Balance Transfer</h4>
            </div>
            <div class="modal-body" style="padding: 2% !important">
              <div class="">
                <div role="form" class="register-form">
                  <img src="frontend/img/loader.gif" style="width:60px;" id="balance_transfer_load">
                  <div id="errorBalanceTransfer" class="alert" role="alert">
                    <button type="button" class="close" data-dismiss="" aria-hidden="true">
                      ×</button> <strong id="alertBalanceTransfer"> </strong> <span id="balanceTransferText"></span>
                  </div>
                  <div class="form-group">
                    <label style="text-align: left;width: 100%;">To <span style="color:#DD4F43;"></span></label>
                    <input type="text" name="display_name" id="to_userId" class="form-control input-lg" placeholder="User Id" tabindex="3">
                  </div>
                  <div class="form-group">
                    <label style="text-align: left;width: 100%;">Amount <span style="color:#DD4F43;"></span></label>
                    <input type="text" id="transferAmount" class="form-control input-lg" placeholder="Amount" tabindex="3">
                  </div>
                  <div class="form-group">
                    <label style="text-align: left;width: 100%;">Password <span style="color:#DD4F43;"></span></label>
                    <input type="text" id="transferPassword" class="form-control input-lg" placeholder="Password" tabindex="3">
                  </div>
                  <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6"><input type="submit" id="balanceTransferSubmit" value="Submit" class="btn btn-success btn-block btn-lg" style="background: #FFC22C" tabindex="7"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!----------End Modal User to User balance Transfer------------->


      <!---------Start -Modal User to Club balance Transfer------------->
      <div id="balanceTransferclub" class="modal fade" role="dialog">
        <div class="modal-dialog  ">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header m-head" style="  background: #FF7118 !important;">
              <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">&times;</button>
              <h4 class="modal-title" style="color: white;"> &nbsp; Balance Transfer</h4>
            </div>
            <div class="modal-body" style="padding: 2% !important">
              <div class="">
                <div role="form" class="register-form">
                  <img src="frontend/img/loader.gif" style="width:60px;" id="balance_transfer_loadclub">
                  <div id="errorBalanceTransferclub" class="alert" role="alert">
                    <button type="button" class="close" data-dismiss="" aria-hidden="true">
                      ×</button> <strong id="alertBalanceTransferclub"> </strong> <span id="balanceTransferText"></span>
                  </div>
                  <div class="form-group">
                    <label style="text-align: left;width: 100%;">To SuperId <span style="color:#DD4F43;"></span></label>
                    <select class="form-control" id="toclub" name="club">
                      <option value="alamin42"> alamin42 </option>
                      <option value="Mhasanbdfp"> Mhasanbdfp </option>
                      <option value="Love24"> Love24 </option>
                      <option value="MaxBet"> MaxBet </option>
                      <option value="DN2020"> DN2020 </option>
                      <option value="DON2"> DON2 </option>
                      <option value="5Star24">5Star24 </option>
                      <option value="Nayem77"> Nayem77 </option>
                      <option value="Tamjid"> Tamjid </option>
                      <option value="Anis777"> Anis777 </option>
                      <option value="Fm12"> Fm12 </option>
                      <option value="Betin"> Betin </option>
                      <option value="Admin2"> Admin2 </option>
                      <option value="BET24W"> BET24W </option>
                      <option value="Online"> Online </option>
                      <option value="Max27"> Max27 </option>
                      <option value="Gazipur"> Gazipur </option>
                      <option value="Star24"> Star24 </option>
                      <option value="Company"> Company </option>
                      <option value="Msk50"> Msk50 </option>
                      <option value="SPONSOR">SPONSOR </option>
                      <option value="Hadik77"> Hadik77 </option>
                      <option value="FDB10"> FDB10 </option>
                      <option value="Super12"> Super12 </option>
                      <option value="Admin24">Admin24 </option>
                      <option value="Jan24">Jan24 </option>
                      <option value="Sb80"> Sb80 </option>
                      <option value="green25"> green25 </option>
                      <option value="Lions24"> Lions24 </option>
                      <option value="Winbet"> Winbet </option>
                      <option value="Tf706"> Tf706 </option>
                      <option value="drarifmiah"> drarifmiah </option>
                      <option value="aman365"> aman365 </option>
                      <option value="Murad38">Murad38 </option>
                      <option value="Bet88">Bet88 </option>
                      <option value="Hardik"> Hardik </option>
                      <option value="Bangladesh">Bangladesh </option>
                      <option value="Pow100">Pow100 </option>
                      <option value="Fox"> Fox </option>
                      <option value="Fc420"> Fc420 </option>
                      <option value="India02"> India02 </option>
                      <option value="Bd365"> Bd365 </option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label style="text-align: left;width: 100%;">Amount <span style="color:#DD4F43;"></span></label>
                    <input type="text" id="transferAmountclub" class="form-control input-lg" placeholder="Amount" tabindex="3">
                  </div>
                  <div class="form-group">
                    <label style="text-align: left;width: 100%;">Password <span style="color:#DD4F43;"></span></label>
                    <input type="text" id="transferPasswordclub" class="form-control input-lg" placeholder="Password" tabindex="3">
                  </div>
                  <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6"><input type="submit" id="balanceTransferSubmitclub" value="Submit" class="btn btn-success btn-block btn-lg" style="background: #FFC22C" tabindex="7"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!----------End Modal User to Club balance Transfer------------->



      <!----------Start Modal Club to User balance Transfer------------->
      <div id="balanceTransferuser" class="modal fade" role="dialog">
        <div class="modal-dialog  ">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header m-head" style="  background: #FF7118 !important;">
              <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">&times;</button>
              <h4 class="modal-title" style="color: white;"> &nbsp; Balance Transfer</h4>
            </div>
            <div class="modal-body" style="padding: 2% !important">
              <div class="">
                <div role="form" class="register-form">
                  <img src="frontend/img/loader.gif" style="width:60px;" id="balance_transfer_loaduser">
                  <div id="errorBalanceTransferuser" class="alert" role="alert">
                    <button type="button" class="close" data-dismiss="" aria-hidden="true">
                      ×</button> <strong id="alertBalanceTransferuser"> </strong> <span id="balanceTransferText"></span>
                  </div>
                  <div class="form-group">
                    <label style="text-align: left;width: 100%;">To User <span style="color:#DD4F43;"></span></label>
                    <input type="text" name="display_name" id="to_userIduser" class="form-control input-lg" placeholder="User Id" tabindex="3">
                  </div>
                  <div class="form-group">
                    <label style="text-align: left;width: 100%;">Amount <span style="color:#DD4F43;"></span></label>
                    <input type="text" id="transferAmountuser" class="form-control input-lg" placeholder="Amount" tabindex="3">
                  </div>
                  <div class="form-group">
                    <label style="text-align: left;width: 100%;">Password <span style="color:#DD4F43;"></span></label>
                    <input type="text" id="transferPassworduser" class="form-control input-lg" placeholder="Password" tabindex="3">
                  </div>
                  <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6"><input type="submit" id="balanceTransferSubmituser" value="Submit" class="btn btn-success btn-block btn-lg" style="background: #FFC22C" tabindex="7"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!----------End Modal Club to User balance Transfer------------->

      <!--Start Modal change club -->
      <div id="changeClub" class="modal fade" role="dialog">
        <div class="modal-dialog  ">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header m-head" style="  background: #FF7118;">
              <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">&times;</button>
              <h4 class="modal-title" style="color: white"> &nbsp; Change Club</h4>
            </div>
            <div class="modal-body" style="padding: 2% !important">
              <div class="">
                <div role="form" class="register-form">
                  <div id="errorClub" class="alert" role="alert">
                    <button type="button" class="close" data-dismiss="" aria-hidden="true">
                      ×</button> <strong id="alertClub"></strong> <span id="errorchangeClubText"></span>
                  </div>
                  <div class="form-group">
                    <label style="text-align: left;width: 100%;">Choose your Club<span style="color:#DD4F43;"></span></label>
                    <select class="form-control" id="cClub">
                      <option disabled selected value>Select Club</option>
                      <option value="Barisal Club">Barisal Club</option>
                      <option value="Tipper shawon club">Tipper shawon club</option>
                      <option value="BET LOVERS">BET LOVERS</option>
                      <option value="MaxBet Club">💎MaxBet Club💎</option>
                      <option value="Dark-Night">Dark-Night</option>
                      <option value="BD 24">BD 24</option>
                      <option value="5 Star Club">5 Star Club</option>
                      <option value="Munshiganj Club">Munshiganj Club</option>
                      <option value="RANGPUR CLUB">RANGPUR CLUB</option>
                      <option value="Dubai Club">Dubai 🇦🇪 Club</option>
                      <option value="Jamuna Club">Jamuna Club</option>
                      <option value="Rock Club">Rock Club</option>
                      <option value="King Club">King Club</option>
                      <option value="GURU CLUB"> 🌀BET-GURU CLUB🌀 </option>
                      <option value="Online Club">Online Club</option>
                      <option value="City club">City club</option>
                      <option value="Gazipur Club">Gazipur Club</option>
                      <option value="STARWARS">Star Wars</option>
                      <option value="THE-WORLD CLUB">THE-WORLD CLUB</option>
                      <option value="Dhaka club">Dhaka club</option>
                      <option value="Golden Club">Golden Club</option>
                      <option value="Real Madrid club">Real Madrid club</option>
                      <option value="FaridpurClub">Faridpur Club</option>
                      <option value="Superclub">Super Club</option>
                      <option value="Friends Club">Friends Club</option>
                      <option value="Help line club">Help line club</option>
                      <option value="Khulna Club">Khulna club</option>
                      <option value="Green Club">Green Club</option>
                      <option value="Lions Club">Lions Club</option>
                      <option value="WinBet Club"> 🏆 WinBet Club 🏆</option>
                      <option value="Australia Club ">Australia Club </option>
                      <option value="Davil Club">Davil Club</option>
                      <option value="CR7 CluB">CR7 CluB</option>
                      <option value="Update club">Update club</option>
                      <option value="Jessore Club">Jessore Club</option>
                      <option value="AsiaClub">Asia club</option>
                      <option value="SAKIB75 CLUB">SAKIB75 CLUB</option>
                      <option value="Bangladesh Club">Bangladesh Club</option>
                      <option value="Powerful Club">Powerful Club</option>
                      <option value="Welcome to Sports">Welcome to Sports</option>
                      <option value="Barcelona Club">Barcelona Club</option>
                      <option value="Indiaclub">Indiaclub</option>
                      <option value="Bet 365">Bet 365</option>
                      <option value="Help Line bdBet">Help Line bdBet</option>
                      <option value="STARS CLUB">STARS CLUB</option>
                    </select>
                    <div class="form-group">
                      <label style="text-align: left;width: 100%;"> Password <span style="color:#DD4F43;"></span></label>
                      <input type="text" name="PasswordClubChange" id="PasswordClubChange" class="form-control input-lg" placeholder="********" tabindex="3" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6"><input type="submit" id="changeClubSubmit" value="Update" class="btn btn-block btn-lg" tabindex="7" style="  background:#FFC22C ; color: #fff"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--End Modal change club -->


      <!--Start modal withdraw password varification -->
      <div id="passwordverify" class="modal fade" role="dialog">
        <div class="modal-dialog  ">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header m-head" style="  background: #FF7118;">
              <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">&times;</button>
              <h4 class="modal-title" style="color: white"> &nbsp; Confirm Password</h4>
            </div>
            <div class="modal-body" style="padding: 2% !important">
              <div class="">
                <div role="form" class="register-form">
                  <div id="errorpasswordconfirm" class="alert" role="alert">
                    <button type="button" class="close" data-dismiss="" aria-hidden="true">
                      ×</button> <strong id="alertconfirmpassword"></strong> <span id="errorpasswordconfirm"></span>
                  </div>
                  <div class="form-group">
                    <div class="form-group">
                      <label style="text-align: left;width: 100%;"> Password <span style="color:#DD4F43;"></span></label>
                      <input type="text" name="confirmpassword" id="confirmpassword" class="form-control input-lg" placeholder="Your Password " tabindex="3" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6"><input type="submit" id="confirmpasswordSubmit" value="Confirm" class="btn btn-block btn-lg" tabindex="7" style="  background:#FFC22C ; color: #fff"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--End modal withdraw password varification -->

      <!--Start Modal changePassword-->
      <div id="changePassword" class="modal fade" role="dialog">
        <div class="modal-dialog  ">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header m-head" style="  background: #FF7118 !important;">
              <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">&times;</button>
              <h4 class="modal-title" style="color: white;"> &nbsp; Change Password</h4>
            </div>
            <div class="modal-body" style="padding: 2% !important">
              <div class="">
                <div role="form" class="register-form">
                  <div id="errorPassword" class="alert" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                      ×</button> <strong id="alertPassword"></strong> <span id="errorChangePasswordText"></span>
                  </div>
                  <div class="form-group">
                    <input style='display:none' type="password" name="" id="" class="form-control input-lg" placeholder="" tabindex="3">
                    <label style="text-align: left;width: 100%;">Current Password <span style="color:#DD4F43;"></span></label>
                    <input type="password" name="currentPassword" id="currentPassword" class="form-control input-lg" placeholder="Current Password " tabindex="3" required>
                  </div>
                  <div class="form-group">
                    <label style="text-align: left;width: 100%;">New Password <span style="color:#DD4F43;"></span></label>
                    <input type="password" name="newPassword" id="newPassword" class="form-control input-lg" placeholder="New Password" tabindex="3" required>
                  </div>
                  <div class="form-group">
                    <label style="text-align: left;width: 100%;">Confirm Password <span style="color:#DD4F43;"></span></label>
                    <input type="password" name="confirmPassword" id="confirmPasswordAgain" class="form-control input-lg" placeholder="Confirm Password" tabindex="3" required>
                  </div>
                  <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6"><input type="submit" id="changePasswordSubmit" value="Submit" class="btn   btn-block btn-lg" tabindex="7" style="  background:#FFC22C;color: #fff"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--End Modal changePassword-->


      <!--Start sign up -->
      <div id="SignUp" class="modal fade" role="dialog">
        <div class="modal-dialog  ">
          <!-- Modal content-->
          <div class="modal-content m-content">
            <div class="modal-header m-head" style="  background: #FF7118 !important;">

              <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">×</button>
              <h4 class="modal-title text-center" style="color: #C0C0C0"> &nbsp; Sign Up</h4>
            </div>
            <div class="modal-body" style="padding: 2% !important">
              <div class="signup-form">
                <div id="formData">
                  <div id="errorSignUp" class="alert" role="alert">
                    <button type="button" class="close" data-dismiss="" aria-hidden="true">
                      ×</button> <strong id="alertSignUp"> </strong><span id="signuperrorText"></span>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-12">
                        <label>Full Name <span style="color: red"></span></label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" required="">
                      </div>
                      <div class="col-xs-12">
                        <label>User Id <span style="color: red"></span></label>
                        <input type="text" class="form-control" name="userId" value="" id="userId" placeholder="user Id" required="">
                        <span id="userIdError" style="color: #C84038;font-family: initial;"></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-12">
                        <label>Mobile Number <span style="color: red"></span></label>
                        <input type="text" class="form-control" name="mobileNumber" id="mobileNumber" placeholder="mobileNumber" required="">
                        <span id="mobileError" style="color: #C84038;font-family: initial;"></span>
                      </div>
                      <div class="col-xs-12">
                        <label>Email <span style="color: red"></span></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="email" required="required">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-12">
                        <label>Select Club <span style="color: red"></span></label>
                        <select class="form-control" id="club" name="club">
                          <option value="sports24bd">sports24bd</option>
                          <option value="Barisal Club">Barisal Club</option>
                          <option value="Tipper shawon club">Tipper shawon club</option>
                          <option value="BET LOVERS">BET LOVERS</option>
                          <option value="MaxBet Club">💎MaxBet Club💎</option>
                          <option value="Dark-Night">Dark-Night</option>
                          <option value="BD 24">BD 24</option>
                          <option value="5 Star Club">5 Star Club</option>
                          <option value="Munshiganj Club">Munshiganj Club</option>
                          <option value="RANGPUR CLUB">RANGPUR CLUB</option>
                          <option value="Dubai Club">Dubai 🇦🇪 Club</option>
                          <option value="Jamuna Club">Jamuna Club</option>
                          <option value="Rock Club">Rock Club</option>
                          <option value="King Club">King Club</option>
                          <option value="GURU CLUB"> 🌀BET-GURU CLUB🌀 </option>
                          <option value="Online Club">Online Club</option>
                          <option value="City club">City club</option>
                          <option value="Gazipur Club">Gazipur Club</option>
                          <option value="STARWARS">Star Wars</option>
                          <option value="THE-WORLD CLUB">THE-WORLD CLUB</option>
                          <option value="Dhaka club">Dhaka club</option>
                          <option value="Golden Club">Golden Club</option>
                          <option value="Real Madrid club">Real Madrid club</option>
                          <option value="FaridpurClub">Faridpur Club</option>
                          <option value="Superclub">Super Club</option>
                          <option value="Friends Club">Friends Club</option>
                          <option value="Help line club">Help line club</option>
                          <option value="Khulna Club">Khulna club</option>
                          <option value="Green Club">Green Club</option>
                          <option value="Lions Club">Lions Club</option>
                          <option value="WinBet Club"> 🏆 WinBet Club 🏆</option>
                          <option value="Australia Club ">Australia Club </option>
                          <option value="Davil Club">Davil Club</option>
                          <option value="CR7 CluB">CR7 CluB</option>
                          <option value="Update club">Update club</option>
                          <option value="Jessore Club">Jessore Club</option>
                          <option value="AsiaClub">Asia club</option>
                          <option value="SAKIB75 CLUB">SAKIB75 CLUB</option>
                          <option value="Bangladesh Club">Bangladesh Club</option>
                          <option value="Powerful Club">Powerful Club</option>
                          <option value="Welcome to Sports">Welcome to Sports</option>
                          <option value="Barcelona Club">Barcelona Club</option>
                          <option value="Indiaclub">Indiaclub</option>
                          <option value="Bet 365">Bet 365</option>
                          <option value="Help Line bdBet">Help Line bdBet</option>
                          <option value="STARS CLUB">STARS CLUB</option>
                        </select>
                      </div>
                      <div class="col-xs-12">
                        <label>Sponsor's Username</label>
                        <input type="text" class="form-control" name="sponsor" id="sponsors" placeholder="Sponsor&#39;s Username">
                        <span id="sponsorError" style="color: #C84038;font-family: initial;"></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-12">
                        <label>Password <span style="color: red"></span></label>
                        <input type="password" class="form-control" name="password" value="" id="passwordsignup" placeholder="password" required="required" pattern=".{6,}" title="6 characters minimum">
                        <span>Password at least 6 characters.</span>
                      </div>
                      <div class="col-xs-12">
                        <label>Confirm Password <span style="color: red"></span></label>
                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="confirmPassword" required="required" pattern=".{6,}" title="6 characters minimum">
                        <span id="passwordError" style="color: #C84038;font-family: initial;"></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" id="userSignUp" name="userSignUp" class="btn btn-primary btn-lg btn-block" style="background: #FFC22C">Register Now</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--End sign up -->

      <!-------deposit modal--------->
      <!--Start Modal deposit -->
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
                          <option disabled selected value>Select method</option>
                          <option value="16">
                            BKash
                          </option>
                        </select>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                      <div class="form-group">
                        <label style="text-align: left;width: 100%;">To <span style="color:#DD4F43;"></span></label>
                        <select class="form-control" id="dTo">
                          <option disabled selected value>Select number</option>
                          <option> 01409-385876 BK </option>
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


      <!--Start modal notice-->
      <div class="modal fade" id="notice" role="dialog">
        <div class="modal-dialog  ">
        @php
        $notice_pop = DB::table('notices')
            ->where('id', '=', 1)
            ->pluck('notice_pop');
            $notice_pop = $notice_pop[0] ?? null;
        @endphp
          <!-- Modal content-->
          <div class="modal-content m-content">
            <div class="modal-header m-head" style="  background: #FF7118 !important;">

              <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">×</button>
              <h4 class="modal-title" style="color: #fff"> &nbsp; Notice</h4>
            </div>
            <div class="modal-body" style="padding: 2% !important">
            <p><strong>{{$notice_pop}}</strong></p>
            </div>
          </div>

        </div>
      </div>
      <!--End modal notice-->


      <!--------ALLL MODAL --->



    <!-- Forget Password MODAL -->
    <div id="forgetPassword" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header m-head" style="  background: #FF7118;">
              <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">&times;</button>
              <h4 class="modal-title" style="color: white"> &nbsp; Confirm Password</h4>
            </div>
            <div class="modal-body" style="padding: 2% !important">
              <div class="">
                <div role="form" class="register-form">
                  <div id="errorpasswordconfirm" class="alert" role="alert">
                    <button type="button" class="close" data-dismiss="" aria-hidden="true">
                      ×</button> <strong id="alertconfirmpassword"></strong> <span id="errorpasswordconfirm"></span>
                  </div>
                  <div class="form-group">
                    <div class="form-group">
                      <label style="text-align: left;width: 100%;"> Email <span style="color:#DD4F43;"></span></label>
                      <input style="color: #07000a" type="text" name="confirmEmail" id="confirmEmail" class="form-control input-lg" placeholder="Your Email " tabindex="3" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6"><input type="submit" id="confirmEmailSubmit" value="Request Confirmatation" class="btn btn-block btn-lg" tabindex="7" style="  background:#0cca1c ; color: #fff"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- End Forget Password MODAL -->

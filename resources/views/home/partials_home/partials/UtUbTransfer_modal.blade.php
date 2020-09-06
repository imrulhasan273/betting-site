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
                <input type="password" id="transferPassword" class="form-control input-lg" placeholder="Password" tabindex="3">
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


<!-- SCRIPT FOR USER TO USER BALANCE TRANSFER - -  -- --->
@include('home.partials_home.partials.UtUbTransfer_script')

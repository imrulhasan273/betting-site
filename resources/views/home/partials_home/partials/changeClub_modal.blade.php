 @php
    $clubs = App\Club::all();
    $club_id = App\User::where('id',Auth::user()->id)->pluck('club_id');
    $clubName = App\Club::where('id',$club_id)->pluck('name');
 @endphp
 <!--Start Modal change club -->
 <div id="changeClub" class="modal fade" role="dialog">
    <div class="modal-dialog  ">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header m-head" style="  background: #FF7118;">
          <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">&times;</button>
          <h4 class="modal-title" style="color: white"> &nbsp; Change Club : {{$clubName}} </h4>
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
                @foreach ($clubs as $club)
                    <option value="{{ $club->id }}">{{ $club->name }}</>
                @endforeach
                </select>
                <div class="form-group">
                  <label style="text-align: left;width: 100%;"> Password <span style="color:#DD4F43;"></span></label>
                  <input type="text" name="clubChangePass" id="clubChangePass" class="form-control input-lg" placeholder="" tabindex="3" required>
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

<!-- START SCRIPTS FOR change club -->
@include('home.partials_home.partials.changeClub_script')
<!-- END SCRIPTS FOR change club -->

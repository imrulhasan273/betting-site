<div class="sidebar" data-color="purple" data-background-color="white"
    data-image=" {{ asset('backend/img/sidebar-1.jpg') }} ">
    <div class="logo"><a href="{{ route('admin.index') }}" class="simple-text logo-normal">
            {{ config('app.name') }}
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">

            @php
                $roles = Auth::check() ? Auth::user()->role->pluck('name')->toArray() : [];
                $role = $roles[0];
            @endphp

            <!-- START USER INFO -->
            <div class="user">
                <div class="photo">
                  <img src="{{asset('/storage/profile/'.Auth::user()->photo)}}" />
                </div>
                <div class="user-info">
                  <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span>
                      {{Auth::user()->name}}
                      <b class="caret"></b>
                    </span>
                  </a>
                  <div class="collapse" id="collapseExample">
                    <ul class="nav">

                      {{-- <li class="nav-item">
                        <a class="nav-link" href="#">
                          <span class="sidebar-mini"> MP </span>
                          <span class="sidebar-normal"> My Profile </span>
                        </a>
                      </li> --}}
                      @if($active=='myacc')
                        <li class="active">
                        @else
                        <li class="nav-item ">
                        @endif
                        <a class="nav-link" href="{{route('users.myaccount.edit')}}">
                          <span class="sidebar-mini"> EP </span>
                          <span class="sidebar-normal"> Edit Profile </span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- END USER INFO -->

            <!-- Start Index Panel -->
            @if($active=='index')
                <li class="active">
                @else
                <li class="nav-item ">
            @endif
            <a class="nav-link" href="{{ route('admin.index') }}">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
            </a>
            </li>
            <!-- End Index Panel -->

            <!-- USER PANEL -->
            @if ($role == 'admin' || $role == 'super_admin')
            @if($active=='users')
                <li class="active ">
                @else
                <li>
            @endif
            <a class="nav-link" href="{{ route('admin.users') }}">
                <i class="material-icons">people</i>
                <p>Users</p>
            </a>
            </li>
            @endif
            <!--- USER PANEL --->

            <!-- SESSION PANEL -->
            @if($role == 'super_admin')
            @if($active=='session')
                <li class="active ">
                @else
                <li>
            @endif
            <a class="nav-link" href="{{ route('admin.session') }}">
                <i class="material-icons">vpn_key</i>
                <p>Session</p>
            </a>
            </li>
            @endif
            <!--- SESSION PANEL --->


            <!-- Start Dropdown Club Panel -->
            @if($active=='clubs' || $active=='clubsWidth' || $active== 'club_user_list')
            <li class="active">
            @else
                <li class="nav-item ">
            @endif
            <a class="nav-link" data-toggle="collapse" href="#clb">
            <i class="material-icons">store</i>
            <p> Clubs
                <b class="caret"></b>
            </p>
            </a>
            <div class="collapse" id="clb">
            <ul class="nav">
                <!-- Start Club List Panel -->

                @if($active=='clubs')
                <li class="active">
                @else
                <li class="nav-item ">
                @endif
                    <a class="nav-link" href="{{ route('admin.clubs') }}">
                        <i class="material-icons">person_pin</i>
                        <p>Club</p>
                    </a>
                </li>
                </li>

                <!-- Start Club Widthdraw Panel -->
                @if($role == 'club_admin')
                @if($active=='clubsWidth')
                <li class="active">
                @else
                <li class="nav-item ">
                @endif
                    <a class="nav-link" href="{{ route('admin.clubs.withdraw.list') }}">
                        <i class="material-icons">money</i>
                        <p>Club Widthdraw</p>
                    </a>
                    </li>
                </li>
                @endif

                 <!-- Start Club Transection History Panel -->
                 @if($role == 'club_admin')
                 @if($active=='clubsTR')
                 <li class="active">
                 @else
                 <li class="nav-item ">
                 @endif
                     <a class="nav-link" href="{{ route('admin.clubs.transection.list') }}">
                         <i class="material-icons">money</i>
                         <p>Transection History</p>
                     </a>
                     </li>
                 </li>
                 @endif

                 <!-- Start Club User History Panel -->
                 @if($role == 'club_admin')
                 @if($active=='club_user_list')
                 <li class="active">
                 @else
                 <li class="nav-item ">
                 @endif
                     <a class="nav-link" href="{{ route('clubs.user.list') }}">
                         <i class="material-icons">contacts</i>
                         <p>Users</p>
                     </a>
                     </li>
                 </li>
                 @endif


            </ul>
            </div>
        </li>
        <li class="nav-item ">
        <!-- End Dropdown Club Panel -->


            <!-- ROLE PANEL -->
            @if ($role == 'admin' || $role == 'super_admin')
            @if($active=='roles')
                <li class="active ">
                @else
                <li>
            @endif
            <a class="nav-link" href="{{ route('admin.roles') }}">
                <i class="material-icons">admin_panel_settings</i>
                <p>Role</p>
            </a>
            </li>
            @endif

            <!-- START GAMES LIST --->
            @if ($role == 'admin' || $role == 'super_admin')
            @if($active=='games')
                <li class="active ">
                @else
                <li>
            @endif
            <a class="nav-link" href="{{ route('admin.games') }}">
                <i class="material-icons">sports_esports</i>
                <p>Game List</p>
            </a>
            </li>
            @endif
            <!-- END GAMES LIST --->

            <!-- START FINISHED GAMES LIST --->
            @if ($role == 'admin' || $role == 'super_admin')
            @if($active=='fgames')
                <li class="active ">
                @else
                <li>
            @endif
            <a class="nav-link" href="{{ route('admin.fgames') }}">
                <i class="material-icons">sports</i>
                <p>Finished Game List</p>
            </a>
            </li>
            @endif
            <!-- END FINISHED GAMES LIST --->

            <!-- START BET LIST --->
            @if ($role == 'admin' || $role == 'super_admin')
            @if($active=='bets')
                <li class="active ">
                @else
                <li>
            @endif
            <a class="nav-link" href="{{ route('admin.bets') }}">
                <i class="material-icons">local_atm</i>
                <p>Game Bet List</p>
            </a>
            </li>
            @endif
            <!-- END BET LIST --->

            <!-- START AUTO STACK LIST --->
            @if ($role == 'admin' || $role == 'super_admin')
            @if($active=='autoStack')
                <li class="active ">
                @else
                <li>
            @endif
            <a class="nav-link" href="{{route('admin.AutoStackCats')}}">
                <i class="material-icons">backup_table</i>
                <p>Auto Stack Management</p>
            </a>
            </li>
            @endif
            <!-- END AUTO STACK LIST --->

            <!-- ROLE PANEL-->

                <!-- Start Dropdown Message Panel -->
                @if ($role == 'admin' || $role == 'super_admin')
                @if($active=='sent_message' || $active=='message')
                    <li class="active">
                @else
                    <li class="nav-item ">
                @endif
                <a class="nav-link" data-toggle="collapse" href="#msg">
                  <i class="material-icons">textsms</i>
                  <p> Message
                    <b class="caret"></b>
                  </p>
                </a>
                <div class="collapse" id="msg">
                  <ul class="nav">
                        <!-- Start Message Panel -->
                        @if($active=='sent_message')
                            <li class="active">
                            @else
                            <li class="nav-item ">
                        @endif
                        <a class="nav-link" href="{{ route('admin.message.view') }}">
                            <i class="material-icons">mark_email_read</i>
                            <p>View Sent Messages</p>
                        </a>
                        </li>
                      </li>
                    <!-- Start Message Panel -->
                        @if($active=='message')
                        <li class="active">
                        @else
                        <li class="nav-item ">
                        @endif
                        <a class="nav-link" href="{{ route('admin.message') }}">
                            <i class="material-icons">send</i>
                            <p>Send Message</p>
                        </a>
                        </li>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
            @endif
            <!-- End Dropdown Message Panel -->


                <!-- Start Dropdown Web Message Panel -->
                @if ($role == 'admin' || $role == 'super_admin')
                @if($active=='webmessage' || $active=='sent_webmessage')
                    <li class="active">
                @else
                    <li class="nav-item ">
                @endif
                <a class="nav-link" data-toggle="collapse" href="#webmsg">
                  <i class="material-icons">forum</i>
                  <p> Web Messages
                    <b class="caret"></b>
                  </p>
                </a>
                <div class="collapse" id="webmsg">
                  <ul class="nav">
                      <!-- Received web message LIST --->
                        @if($active=='send_to_club')
                            <li class="active">
                            @else
                            <li>
                        @endif
                        <a class="nav-link" href="{{ route('webmessage.admin.send.club') }}">
                            <i class="material-icons">send</i>
                            <p>Send Message (Club)</p>
                        </a>
                        </li>
                            </li>
                      <!-- Received web message LIST --->
                        @if($active=='webmessage')
                            <li class="active">
                            @else
                            <li>
                        @endif
                        <a class="nav-link" href="{{ route('webmessage.admin.index') }}">
                            <i class="material-icons">reply_all</i>
                            <p>Inbox (User)</p>
                        </a>
                        </li>
                            </li>

                             @if($active=='webmessage_club_index')
                            <li class="active">
                            @else
                            <li>
                        @endif
                        <a class="nav-link" href="{{ route('webmessage.admin.club.index') }}">
                            <i class="material-icons">local_post_office</i>
                            <p>Received Club Messages</p>
                        </a>
                        </li>
                            </li>
                     <!-- Received web message LIST  END--->

                      <!-- View Sent web message LIST --->
                        @if($active=='sent_webmessage')
                            <li class="active ">
                            @else
                            <li>
                        @endif
                        <a class="nav-link" href="{{ route('webmessage.admin.view') }}">
                            <i class="material-icons">analytics</i>
                            <p>Sent Messages</p>
                        </a>
                        </li>
                            </li>
            <!-- Sent web message LIST  END--->


                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                @endif
            <!-- End Dropdown Message Panel -->



            <!-- PAYMENT OPTION PANEL -->
            @if ($role == 'admin' || $role == 'super_admin')
            @if($active=='payments')
                <li class="active ">
                @else
                <li>
            @endif
            <a class="nav-link" href="{{ route('admin.paymentOption') }}">
                <i class="material-icons">payment</i>
                <p>Payment Option</p>
            </a>
            </li>
            @endif
            <!--- PAYMENT OPTION PANEL --->

            <!-- START DEPOSIT PANEL -->
            @if ($role == 'admin' || $role == 'super_admin')
            @if($active=='Udeposits')
                <li class="active ">
                @else
                <li>
            @endif
            <a class="nav-link" href="{{ route('admin.user.deposit') }}">
                <i class="material-icons">account_balance</i>
                <p>User Deposit</p>
            </a>
            </li>
            @endif
            <!---END DEPOSIT PANEL --->

            <!-- START WIDTHDRAWS PANEL -->
            {{-- @if ($role == 'admin' || $role == 'super_admin') --}}
            {{-- @if($active=='Uwidthdraws')
                <li class="active ">
                @else
                <li>
            @endif
            <a class="nav-link" href="{{ route('admin.user.widthdraw') }}">
                <i class="material-icons">account_balance</i>
                <p>User Widthdraws</p>
            </a>
            </li> --}}
            {{-- @endif --}}
            <!---END WIDTHDRAWS PANEL --->

            <!-- START CLUB WIDTHDRAWS PANEL -->
            {{-- @if ($role == 'admin' || $role == 'super_admin') --}}
            {{-- @if($active=='Cwidthdraws')
                <li class="active ">
                @else
                <li>
            @endif
            <a class="nav-link" href="{{ route('admin.clubs.withdraw') }}">
                <i class="material-icons">account_balance</i>
                <p>Club Widthdraws</p>
            </a>
            </li> --}}
            {{-- @endif --}}
            <!---END CLUB WIDTHDRAWS PANEL --->


              <!-- Start Dropdown Withdraw Panel -->
              @if ($role == 'admin' || $role == 'super_admin')
                @if($active=='Uwidthdraws' || $active=='Cwidthdraws')
                    <li class="active">
                @else
                    <li class="nav-item ">
                @endif
                <a class="nav-link" data-toggle="collapse" href="#withdraw">
                  <i class="material-icons">monetization_on</i>
                  <p> Withdraws
                    <b class="caret"></b>
                  </p>
                </a>
                <div class="collapse" id="withdraw">
                  <ul class="nav">
            @if($active=='Uwidthdraws')
                <li class="active ">
                @else
                <li>
            @endif
            <a class="nav-link" href="{{ route('admin.user.widthdraw') }}">
                <i class="material-icons">payments</i>
                <p>User Widthdraws</p>
            </a>
            </li>
            @if($active=='Cwidthdraws')
                <li class="active ">
                @else
                <li>
            @endif
            <a class="nav-link" href="{{ route('admin.clubs.withdraw') }}">
                <i class="material-icons">account_balance</i>
                <p>Club Widthdraws</p>
            </a>
            </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
            @endif
            <!-- End Dropdown Withdraw Panel -->


            <!-- Start Dropdown Setup site Panel -->
            @if ($role == 'admin' || $role == 'super_admin')
            @if($active=='settings' || $active=='rule' || $active=='faq' || $active=='about' )
            <li class="active">
            @else
            <li class="nav-item ">
            @endif
            <a class="nav-link" data-toggle="collapse" href="#site_setup">
                  <i class="material-icons">language</i>
                  <p> Setup Site
                    <b class="caret"></b>
                  </p>
                </a>
                <div class="collapse" id="site_setup">
                  <ul class="nav">
             @if($active=='settings')
                <li class="active">
                @else
                <li class="nav-item ">
            @endif
            <a class="nav-link" href="{{ route('admin.setting') }}">
                <i class="material-icons">build</i>
                <p>Settings</p>
            </a>
            </li>
                </li>

            @if($active=='faq')
                <li class="active">
                @else
                <li class="nav-item ">
            @endif
            <a class="nav-link" href="{{ route('admin.faq.index') }}">
                <i class="material-icons">flaky</i>
                <p>FAQ</p>
            </a>
            </li>
                </li>

                     @if($active=='rule')
                <li class="active">
                @else
                <li class="nav-item ">
            @endif
            <a class="nav-link" href="{{ route('admin.rule.index') }}">
                <i class="material-icons">rule_folder</i>
                <p>Rules</p>
            </a>
            </li>
                </li
                @if($active=='about')
                <li class="active">
                @else
                <li class="nav-item ">
            @endif
            <a class="nav-link" href="{{ route('admin.about.index') }}">
                <i class="material-icons">business</i>
                <p>About US</p>
            </a>
            </li>
                </li>

                  </ul>
                </div>
              </li>
              <li class="nav-item ">
            @endif
            <!-- End Dropdown Withdraw Panel -->

            <!-- Start Notice Panel -->
            @if ($role == 'admin' || $role == 'super_admin')
            @if($active=='notice')
                <li class="active">
                @else
                <li class="nav-item ">
            @endif
            <a class="nav-link" href="{{ route('admin.notice') }}">
                <i class="material-icons">announcement</i>
                <p>Notice</p>
            </a>
            </li>
            @endif


      <!-- Start Club Message Panel -->
      @if ($role == 'club_admin')
        @if($active=='club_message')
                <li class="active">
                @else
                <li class="nav-item ">
            @endif
            <a class="nav-link" href="{{ route('webmessage.club.index') }}">
                <i class="material-icons">local_police</i>
                <p>Club Message</p>
            </a>
            </li>
                </li>
            <!-- End Index Panel -->
        </ul>
        @endif

    </div>
</div>

<div class="sidebar" data-color="purple" data-background-color="white"
    data-image=" {{ asset('backend/img/sidebar-1.jpg') }} ">
    <div class="logo"><a href="" class="simple-text logo-normal">
            BD-BET
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">

            <!-- START USER INFO -->
            <div class="user">
                <div class="photo">
                  <img src="{{asset('backend/assets/img/faces/avatar.jpg')}}" />
                </div>
                <div class="user-info">
                  <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span>
                      Tania Andrew
                      <b class="caret"></b>
                    </span>
                  </a>
                  <div class="collapse" id="collapseExample">
                    <ul class="nav">
                      <li class="nav-item">
                        <a class="nav-link" href="#">
                          <span class="sidebar-mini"> MP </span>
                          <span class="sidebar-normal"> My Profile </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">
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
            {{-- @if ($role == 'admin' || $role == 'super_admin') --}}
            @if($active=='users')
                <li class="active ">
                @else
                <li>
            @endif
            <a class="nav-link" href="{{ route('admin.users') }}">
                <i class="material-icons">people</i>
                <p>User</p>
            </a>
            </li>
            {{-- @endif --}}
            <!--- USER PANEL --->


            <!-- ROLE PANEL -->
            {{-- @if ($role == 'admin' || $role == 'super_admin') --}}
            @if($active=='roles')
                <li class="active ">
                @else
                <li>
            @endif
            <a class="nav-link" href="{{ route('admin.roles') }}">
                <i class="material-icons">psychology</i>
                <p>Role</p>
            </a>
            </li>
            {{-- @endif --}}

            <!-- START GAMES LIST --->
            @if($active=='games')
                <li class="active ">
                @else
                <li>
            @endif
            <a class="nav-link" href="{{ route('admin.games') }}">
                <i class="material-icons">psychology</i>
                <p>Game List</p>
            </a>
            </li>
            <!-- END GAMES LIST --->

            <!-- START FINISHED GAMES LIST --->
            @if($active=='fgames')
                <li class="active ">
                @else
                <li>
            @endif
            <a class="nav-link" href="{{ route('admin.fgames') }}">
                <i class="material-icons">psychology</i>
                <p>Finished Game List</p>
            </a>
            </li>
            <!-- END FINISHED GAMES LIST --->

            <!-- START BET LIST --->
            @if($active=='bets')
                <li class="active ">
                @else
                <li>
            @endif
            <a class="nav-link" href="{{ route('admin.bets') }}">
                <i class="material-icons">psychology</i>
                <p>Game Bet List</p>
            </a>
            </li>
            <!-- END BET LIST --->

            <!-- START AUTO STACK LIST --->
            @if($active=='autoStack')
                <li class="active ">
                @else
                <li>
            @endif
            <a class="nav-link" href="">
                <i class="material-icons">psychology</i>
                <p>Auto Stack Management</p>
            </a>
            </li>
            <!-- END AUTO STACK LIST --->

            <!-- ROLE PANEL-->
            <li class="nav-item ">
                <a class="nav-link" href="./notifications.html">
                    <i class="material-icons">notifications</i>
                    <p>Notifications</p>
                </a>
            </li>


                <!-- Start Dropdown Message Panel -->
                @if($active=='sent_message' || $active=='message')
                    <li class="active">
                @else
                    <li class="nav-item ">
                @endif
                <a class="nav-link" data-toggle="collapse" href="#msg">
                  <i class="material-icons">message</i>
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
            <!-- End Dropdown Message Panel -->


                <!-- Start Dropdown Web Message Panel -->
                @if($active=='webmessage' || $active=='sent_webmessage')
                    <li class="active">
                @else
                    <li class="nav-item ">
                @endif
                <a class="nav-link" data-toggle="collapse" href="#webmsg">
                  <i class="material-icons">forum</i>
                  <p> User Messages
                    <b class="caret"></b>
                  </p>
                </a>
                <div class="collapse" id="webmsg">
                  <ul class="nav">
                      <!-- Received web message LIST --->
                        @if($active=='webmessage')
                            <li class="active ">
                            @else
                            <li>
                        @endif
                        <a class="nav-link" href="{{ route('webmessage.admin.index') }}">
                            <i class="material-icons">send</i>
                            <p>Received Message</p>
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
                            <i class="material-icons">received</i>
                            <p>Sent Messages</p>
                        </a>
                        </li>
                            </li>
            <!-- Sent web message LIST  END--->


                  </ul>
                </div>
              </li>
              <li class="nav-item ">
            <!-- End Dropdown Message Panel -->







            <!-- Start Notice Panel -->
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
            <!-- Start Setting Panel -->
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
            <!-- End Index Panel -->
        </ul>


    </div>
</div>

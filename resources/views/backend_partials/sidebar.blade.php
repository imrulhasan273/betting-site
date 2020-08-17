<div class="sidebar" data-color="purple" data-background-color="white"
    data-image=" {{ asset('backend/img/sidebar-1.jpg') }} ">
    <div class="logo"><a href="" class="simple-text logo-normal">
            Creative Tim
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
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
            <a class="nav-link" href="">
                <i class="material-icons">psychology</i>
                <p>Game List</p>
            </a>
            </li>
            <!-- END GAMES LIST --->

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

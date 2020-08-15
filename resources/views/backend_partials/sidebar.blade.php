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
            <!-- ROLE PANEL-->

            <li class="nav-item ">
                <a class="nav-link" href="./notifications.html">
                    <i class="material-icons">notifications</i>
                    <p>Notifications</p>
                </a>
            </li>

             <!-- Dropdown  PANEL-->
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
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="sidebar-mini"> S </span>
                            <span class="sidebar-normal"> Settings </span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Dropdown  PANEL-->

            <!-- Start Message Panel -->
            @if($active=='message')
                <li class="active">
                @else
                <li class="nav-item ">
            @endif
            <a class="nav-link" href="{{ route('admin.message') }}">
                <i class="material-icons">message</i>
                <p>Message</p>
            </a>
            </li>

            <!-- Start Message Panel -->
            @if($active=='sent_message')
                <li class="active">
                @else
                <li class="nav-item ">
            @endif
            <a class="nav-link" href="{{ route('admin.message.view') }}">
                <i class="material-icons">message</i>
                <p>Sent Message</p>
            </a>
            </li>


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

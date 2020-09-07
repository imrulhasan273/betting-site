@php
$active='index';
$authRole = Auth::check() ? Auth::user()->role->pluck('name')->toArray() : [];
$authRole = $authRole[0];
@endphp
@extends('layouts.backend')

@section('content')

    <div class="col-md-12">
        <x-alert/>
    </div>

    @if($authRole == 'super_admin' || $authRole == 'admin')
     <div class="row">

        <!----------===================ACCOUNT BALNCE OF ORGANIZATION==========-------------->
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">

                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">store</i>
                    </div>
                    <p class="card-category">Account Balance</p>
                    @if( $superAdmin->credits<0)
                    @php
                        $due = -$superAdmin->credits;
                    @endphp
                    <h4 class="card-title">DUE. {{ $due }}</h4>
                    @else
                    <h4 class="card-title">BDT. {{ $superAdmin->credits }}</h4>
                    @endif
                </div>
                <div class="card-footer">
                    <a href="{{ route('index.acc.edit') }}" type="button" rel="tooltip" class="btn btn-success">
                        <i class="material-icons">attach_money</i>Recharge
                    </a>
                </div>
            </div>
        </div>
        <!------------================= ACCOUNT BALNCE OF ORGANIZATION===================---------- -->




        <!------------================= TOTAL ADMINS ===================---------- -->
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">admin_panel_settings</i>
                </div>
                <p class="card-category">Total Admins</p>
                <h3 class="card-title">{{ $CountAdmins }}</h3>
                </div>
                <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                </div>
                </div>
            </div>
        </div>
        <!------------================= TOTAL ADMINS===================---------- -->


        <!------------================= TOTAL CLUBS===================---------- -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">house_siding</i>
                    </div>
                    <p class="card-category">Total Clubs</p>
                    <h3 class="card-title">{{ $CountClubs }}</h3>
                    </div>
                    <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i> Tracked from Github
                    </div>
                    </div>
                </div>
            </div>
        <!------------================= TOTAL CLUBS===================---------- -->


            <!------------================= TOTAL USERS ===================---------- -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">supervised_user_circle</i>
                    </div>
                    <p class="card-category">Total Users</p>
                    <h3 class="card-title">{{ $CountUsers }}</h3>
                    </div>
                    <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i> Just Updated
                    </div>
                    </div>
                </div>
            </div>
        <!------------================= TOTAL CLUBS===================---------- -->
      </div>
     @endif


        @if($authRole == 'super_admin' || $authRole == 'admin')
        <div class="row">
            <div class="col-md-4">
                <div class="card card-chart">
                  <div class="card-header card-header-danger">
                    <div class="ct-chart" id="completedTasksChart"></div>
                  </div>

                  <div class="card-body">
                      <form method="POST" action="{{route('sponsor.commission.update')}}">
                      @csrf
                          <h4 class="card-title">Sponsor Commission</h4>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label class="bmd-label-floating">Commission (%)</label>
                                  <input name="commission" value="{{ $commission }}" type="text" class="form-control">
                              </div>
                          </div>
                          <button name="submit" type="submit" class="btn btn-success pull-right">Update</button>
                      </form>
                  </div>

                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">access_time</i> campaign sent 2 days ago
                    </div>
                  </div>
                </div>
              </div>


            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-success">
                  <div class="ct-chart" id="dailySalesChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Daily Sales</h4>
                  <p class="card-category">
                    <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> updated 4 minutes ago
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-warning">
                  <div class="ct-chart" id="websiteViewsChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Email Subscriptions</h4>
                  <p class="card-category">Last Campaign Performance</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> campaign sent 2 days ago
                  </div>
                </div>
              </div>
            </div>
        </div>
        @endif

        @if($authRole == 'super_admin' || $authRole == 'admin')
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">User Stats</h4>
                  <p class="card-category">New Registered Users</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>ID</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Club</th>
                    </thead>
                    <tbody>
                        @foreach ($dash_users as $key=> $user)
                        @if($user->role[0]->name=='user');
                        @php
                            $clubName = App\Club::where('id', $user->club_id)->pluck('name');
                            $clubName = $clubName[0] ?? null;
                        @endphp
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $clubName }}</td>
                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        @endif
        <!-- =====================CLUB DASHBOARDS CONTENTS GOES HERE============================= --->

     @if($authRole === 'club_admin')

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">monetization_on</i>
                  </div>
                  <p class="card-category">Current Balance</p>
                  <h3 class="card-title">1000
                    <small>Tk.</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">money</i>
                    <a href="{{ route('admin.clubs.withdraw.request') }}">Withdraw Now</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">money</i>
                  </div>
                  <p class="card-category">Today</p>
                  <h3 class="card-title">1500
                    <small>Tk.</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">info</i>
                    <a>Comission running day</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">local_atm</i>
                  </div>
                  <p class="card-category">This Month</p>
                  <h3 class="card-title">500
                    <small>Tk.</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">info</i>
                    <a>Income this month</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">account_balance</i>
                  </div>
                  <p class="card-category">Life Time</p>
                  <h3 class="card-title">2500
                    <small>Tk.</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">info</i>
                    <a>Income lifetime</a>
                  </div>
                </div>
              </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">User Stats</h4>
                  <p class="card-category">Newly registered user(s)</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-primary">
                      <tr><th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>phone</th>
                    </tr></thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Philip Chaney</td>
                        <td>user@gmail.com</td>
                        <td>0197822685</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
     @endif
        </div>
@endsection

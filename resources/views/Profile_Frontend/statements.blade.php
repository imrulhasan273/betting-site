@extends('layouts.frontend')
@section('content')
<section style="padding-top: 7%;padding-bottom: 20%;" class="callaction ">
    <div class="content-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-11 bhoechie-tab-container" style="width: 98.5% !important;background: #ffffff;">

                    <!-- START OPTIONS -->
                    <div class="col-lg-12 bhoechie-tab-menu">
                        <div class="list-group " style="margin-top: 5px;overflow:hidden;">
                            <a href=" #" class=" text-center liststyle" style="text-decoration: none;margin-top: 3px;">
                                All Bets
                            </a>

                            <a href=" #" class=" text-center liststyle" data-toggle="modal" data-target="#" style="text-decoration: none;margin-top: 3px;">
                                All Deposit
                            </a>

                            <a href="#" class=" text-center liststyle" data-toggle="modal" data-target="" style="text-decoration: none;margin-top: 3px;">
                                All Withdrawal
                            </a>
                            <a href=" #" class="text-center liststyle" data-toggle="modal" data-target="#" style="text-decoration: none;margin-top: 3px;">
                                Balance Transfer
                            </a>
                            <a href=" #" class="text-center liststyle" data-toggle="modal" data-target="#" style="text-decoration: none;margin-top: 3px;">
                                Transaction History
                            </a>
                            <a href=" #" class="text-center liststyle" data-toggle="modal" data-target="#" style="text-decoration: none;margin-top: 3px;">
                                OneTen
                            </a>
                        </div>
                    </div>
                    <!--END OPTIONS -->


                    <!-- ALERT -->
                    <div class="alert " id="cancelwithdraw">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="material-icons">close</i>
                        </button>
                        <span>
                        <b></b>
                        <b id="cancelwithdraw-alert"></b>
                        </span>
                    </div>
                    <!-- ALERT -->



                    <!-- START BET SECTION -->
                    @include('Profile_Frontend.wallet_partials.statements.bet')
                    <!-- END BET SECTION -->


                    <!-- START DEPOSIT SECTION -->
                    @include('Profile_Frontend.wallet_partials.statements.deposit')
                    <!-- END DEPOSIT SECTION -->


                    <!-- END WIDTHDRAW SECTION  -->
                    @include('Profile_Frontend.wallet_partials.statements.widthdraw')
                    <!-- END WIDTHDRAW SECTION -->


                    <!--START  BALANCE TRANSFER SECTION -->
                    @include('Profile_Frontend.wallet_partials.statements.btransfer')
                    <!--END  BALANCE TRANSFER SECTION -->


                    <!-- START TRANSECTION HISTORY SECTION -->
                    @include('Profile_Frontend.wallet_partials.statements.transection_history')
                    <!-- END TRANSECTION HISTORY SECTION -->



                    <!-- START COIN FLIP SECTION -->

                    <!-- END COIN FLIP SECTION -->



                    <!-- START ONE TEN SECTION -->
                    @include('Profile_Frontend.wallet_partials.statements.oneten')
                    <!-- END ONE TEN SECTION -->



                     <!--START BET SLIP-->

                    <!--END BET SLIP-->

                    <!-- START SCRIPTS -->
                    @include('Profile_Frontend.wallet_partials.statements.scripts')
                    <!-- END SCRIPTS -->


                </div>
            </div>
        </div>
    </div>

</section>


@endsection

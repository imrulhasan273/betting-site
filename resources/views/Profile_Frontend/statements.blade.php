@extends('layouts.frontend')
@section('content')
<section style="padding-top: 7%;" class="callaction ">
    <div class="content-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-11 bhoechie-tab-container" style="width: 98.5% !important;background: #ffffff;">

                    <!-- START OPTIONS -->
                    <div class="col-lg-12  bhoechie-tab-menu">
                        <div class="list-group " style="margin-top: 5px;overflow:hidden;">
                            <a href=" #" class="active text-center liststyle" style="text-decoration: none;margin-top: 3px;">
                                All Bets
                            </a>
                            <a href=" #" class="text-center liststyle" data-toggle="modal" data-target="#" style="text-decoration: none;margin-top: 3px;">
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


                    <div class="alert " id="cancelwithdraw">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="material-icons">close</i>
                        </button>
                        <span>
                        <b></b>
                        <b id="cancelwithdraw-alert"></b>
                        </span>
                    </div>



                    <!-- START BET SECTION -->
                    {{-- @include('wallet_partials.statements.bet') --}}
                    <!-- END BET SECTION -->


                    <!-- START DEPOSITE SECTION -->

                    <!-- END DEPOSITE SECTION -->


                    <!-- END WIDTHDRAW SECTION  -->

                    <!-- END WIDTHDRAW SECTION -->


                    <!--START  BALANCE TRANSFER SECTION -->

                    <!--END  BALANCE TRANSFER SECTION -->


                    <!-- START TRANSECTION HISTORY SECTION -->




                    <!-- START COIN FLIP SECTION -->

                    <!-- END COIN FLIP SECTION -->



                    <!-- START ONE TEN SECTION -->

                    <!-- END ONE TEN SECTION -->


                     <!--START BIT SLIP-->

                    <!--END BIT SLIP-->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

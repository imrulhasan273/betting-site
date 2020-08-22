<script type="text/javascript">
    var log = 0;
    if (log) {

      $('.signnav').hide();
      $('.nav1').show();

      $('.nav2').show();


    } else {
      $('.nav1').hide();

      $('.nav2').hide();
      $('.signnav').show();

    }

    var opennavstatus = 0;

    function openNav() {

      if (opennavstatus == 0) {
        opennavstatus = 1;
        $('#mySidenav').css({
          width: '210px'
        });
      } else {

        document.getElementById("mySidenav").style.width = "0";
        opennavstatus = 0;
      }

    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";

    }


    function resize() {
      if ($(window).width() > 768) {
        $('#myNavbar').show();
        $('.b1').hide();
      } else {
        $('#myNavbar').hide();
        $('.b1').show();
      }
    }
    resize();
    $(window).resize(function() {
      resize();
    });

    var loginactive = 1;
    $('#openlogin').click(function(event) {

      if (loginactive == 1) {
        document.getElementById("registernav").style.display = "none";
        registeractive = '1';
        document.getElementById("loginnav").style.display = "block";
        $('#allbody').removeClass("bodytransitionoff");
        $('#allbody').addClass("bodytransition");
        loginactive = '0';
      } else {
        $('#allbody').removeClass("bodytransition");
        $('#allbody').addClass("bodytransitionoff");

        $("#loginnav").delay(100).fadeOut();
        loginactive = '1';

      }

    });

    var registeractive = 1;
    $('#openregister').click(function(event) {

      if (registeractive == 1) {
        document.getElementById("loginnav").style.display = "none";
        loginactive = 1;
        document.getElementById("registernav").style.display = "block";
        $('#allbody').removeClass("bodytransitionoff");
        $('#allbody').addClass("bodytransition");
        registeractive = '0';
      } else {

        $('#allbody').removeClass("bodytransition");
        $('#allbody').addClass("bodytransitionoff");

        $("#loginnav").delay(100).fadeOut();

        registeractive = '1';
      }

    });

    $('#closenav').click(function(event) {
      if (loginactive == 1) {
        document.getElementById("loginnav").style.display = "block";
        $('#allbody').removeClass("bodytransitionoff");
        $('#allbody').addClass("bodytransition");
        loginactive = '0';
      } else {

        $('#allbody').removeClass("bodytransition");
        $('#allbody').addClass("bodytransitionoff");

        $("#loginnav").delay(100).fadeOut();
        loginactive = '1';

      }

    });

    $('#closenavregister').click(function(event) {

      if (registeractive == 1) {

        document.getElementById("registernav").style.display = "block";
        $('#allbody').removeClass("bodytransitionoff");
        $('#allbody').addClass("bodytransition");
        registeractive = '0';
      } else {
        $('#allbody').removeClass("bodytransition");
        $('#allbody').addClass("bodytransitionoff");

        $("#registernav").delay(100).fadeOut();
        registeractive = '1';
      }

    });

    function openlogin() {
      document.getElementById("loginnav").style.display = "block";
      $('#allbody').removeClass("bodytransitionoff");
      $('#allbody').addClass("bodytransition");
      loginactive = '0';
    }
</script>

<script type="text/javascript">
    $.ajaxSetup({

      headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

      }

    });

    //===============================User Login=====================================
    $(document).ready(function($) {
      $('#balance_transfer_load').hide();
      $('#deposit_load').hide();
      $('#withdraw_load').hide();
      $('#cancelwithdraw_load').hide();
      $('#errorSignIn').hide();
      $('#errorSignUp').hide();
      $('#errorDeposit').hide();
      $('#errorWithdraw').hide();
      $('#errorClub').hide();
      $('#errorPassword').hide();
      $('#errorBet').hide();
      $('#errorBalanceTransfer').hide();
      $('#hide').hide();
      $('#deposit_notice').hide();
      $('#withdraw_notice').hide();
      $("#cancelwithdraw").hide();
      $("#balance_transfer_loadclub").hide();
      $("#balance_transfer_loaduser").hide();


      $.ajax({
        method: "POST",
        // url: 'clear_bet_slip',
        data: {
          id: "1"
        },
        success: function(data) {


        }
      });
    });
    var multi = 0;
    $("#userSignInForm").click(function(e) {


      e.preventDefault();
      var user = $("#user").val();

      var password = $("#password").val();



      $.ajax({

        type: 'POST',

        // url: 'user_login',

        data: {
          user: user,
          password: password
        },

        success: function(data) {

          if (data == "1")

          {

            location.reload();

          }
          if (data == '0') {
            $('#errorSignIn').show();
            $('#errorSignIn').removeClass('alert-danger');
            $('#errorSignIn').removeClass('alert-success');
            $('#errorSignIn').addClass('alert-danger');
            $('#alertsignin').html("Login Failed");
            setTimeout(function() {

              $("#errorSignIn").hide();


            }, 2000);

          }
          if (data == '2')

          {
            $('#errorSignIn').show();
            $('#errorSignIn').removeClass('alert-danger');
            $('#errorSignIn').removeClass('alert-success');
            $('#errorSignIn').addClass('alert-danger');
            $('#alertsignin').html("User and password required");
            setTimeout(function() {

              $("#errorSignIn").hide();


            }, 2000);

          }
        }

      });
    });
    //==========================user signup validation===============================
    $("#userId").keyup(function() {

      var userId = $(this).val();
      //alert(userId);
      $.ajax({
        method: "POST",
        // url: 'user_validation',

        data: {
          userId: userId
        },
        success: function(data) {

          if (data == "1")

          {
            $('#errorSignUp').show();

            $('#errorSignUp').removeClass('alert-success');
            $('#errorSignUp').removeClass('alert-danger');
            $('#errorSignUp').addClass('alert-danger');

            $('#alertSignUp').html("User already Exist.Use different ID");

          }
          if (data == '0') {
            //$('#errorSignUp').removeClass('alert-danger');
            //$('#errorSignUp').removeClass('alert-success');
            ///// $('#errorSignUp').addClass('alert-danger');
            $('#alertSignUp').html("");
            $('#errorSignUp').hide();

          }

        }
      });

    });


    $("#sponsor").blur(function() {
      var sponsor = $(this).val();
      var club = $("#club").val();
      if (sponsor !== '') {
        $.ajax({
          method: "POST",
        //   url: 'user_validation',
          dataType: 'text',
          data: {
            sponsor: sponsor
          },
          success: function(data) {
            if (data == "1")

            {
              $('#errorSignUp').hide();
              $('#alertSignUp').html("");

              //$('#errorSignUp').removeClass('alert-danger');
              //$('#errorSignUp').removeClass('alert-success');
              ///// $('#errorSignUp').addClass('alert-danger');
            }
            if (data == '0') {
              $('#errorSignUp').show();
              $('#errorSignUp').removeClass('alert-success');
              $('#errorSignUp').removeClass('alert-danger');
              $('#errorSignUp').addClass('alert-danger');
              $('#alertSignUp').html("Sponser Not Found");

            }
          }
        });

      }

    });
    $("#mobileNumber").keyup(function() {
      var Number = $(this).val();

      var IndNum = /^[0]?(1)[3456789]\d{8}$/;

      if (IndNum.test(Number)) {
        $('#mobileError').text('');
      } else {
        $('#mobileError').text('please enter valid mobile number');
      }

    });


    $("#userSignUp").on("click", function() {

      var userId = $("#userId").val();
      var name = $("#name").val();
      var email = $("#email").val();
      var password = $("#passwordsignup").val();
      var club = $("#club").val();
      var mobileNumber = $("#mobileNumber").val();
      var sponsor = $("#sponsor_register").val();
      var confirmPassword = $("#confirmPassword").val();

      $.ajax({
        method: "POST",
        // url: 'user_signup',
        data: {
          name: name,
          userId: userId,
          email: email,
          password: password,
          confirmPassword: confirmPassword,
          mobileNumber: mobileNumber,
          sponsor: sponsor,
          club: club
        },
        success: function(data) {

          if (data == '1') {
            $('#errorSignUp').show();
            $('#errorSignUp').removeClass('alert-success');
            $('#errorSignUp').removeClass('alert-danger');
            $('#errorSignUp').addClass('alert-danger');
            $('#alertSignUp').html("You are missing any mandatory field");
            setTimeout(function() {
              $("#errorSignUp").hide();
            }, 3000);
          }
          if (data == '2') {
            $('#errorSignUp').show();
            $('#errorSignUp').removeClass('alert-success');
            $('#errorSignUp').removeClass('alert-danger');
            $('#errorSignUp').addClass('alert-danger');
            $('#alertSignUp').html("password didn't matched");
            setTimeout(function() {
              $("#errorSignUp").hide();
            }, 3000);
          }
          if (data == '3') {
            $('#errorSignUp').show();
            $('#errorSignUp').removeClass('alert-success');
            $('#errorSignUp').removeClass('alert-danger');
            $('#errorSignUp').addClass('alert-danger');
            $('#alertSignUp').html("userId already exist");
            setTimeout(function() {
              $("#errorSignUp").hide();
            }, 3000);
          }
          if (data == '4') {
            $('#errorSignUp').show();
            $('#errorSignUp').removeClass('alert-success');
            $('#errorSignUp').removeClass('alert-danger');
            $('#errorSignUp').addClass('alert-danger');
            $('#alertSignUp').html("Mobile number already used.");
            setTimeout(function() {
              $("#errorSignUp").hide();
            }, 3000);
          }
          if (data == '5') {
            $('#errorSignUp').show();
            $('#errorSignUp').removeClass('alert-success');
            $('#errorSignUp').removeClass('alert-danger');
            $('#errorSignUp').addClass('alert-danger');
            $('#alertSignUp').html("Emil is already used.");
            setTimeout(function() {
              $("#errorSignUp").hide();
            }, 3000);

          }
          if (data == '6') {
            $('#errorSignUp').show();
            $('#errorSignUp').removeClass('alert-success');
            $('#errorSignUp').removeClass('alert-danger');
            $('#errorSignUp').addClass('alert-danger');
            $('#alertSignUp').html("user name already exist in club");
            setTimeout(function() {
              $("#errorSignUp").hide();
            }, 3000);

          }
          if (data == '7') {
            $('#errorSignUp').show();
            $('#errorSignUp').removeClass('alert-success');
            $('#errorSignUp').removeClass('alert-danger');
            $('#errorSignUp').addClass('alert-danger');
            $('#alertSignUp').html("sponsor not matched");
            setTimeout(function() {
              $("#errorSignUp").hide();
            }, 3000);

          }
          if (data == '8') {
            $('#errorSignUp').show();
            $('#errorSignUp').removeClass('alert-success');
            $('#errorSignUp').removeClass('alert-danger');
            $('#errorSignUp').addClass('alert-success');
            $('#alertSignUp').html("Signup Successul");

            setTimeout(function() {
              $("#errorSignUp").hide();
            }, 1000);
            window.open('https://www.bdbet10.com', '_self');

          }

        }
      });

    });
    var depositclick = 0;
    $("#depositSubmit").on("click", function() {

      depositclick = depositclick + 1;
      if (depositclick == 1) {
        $('#deposit_load').show();
        var dAmount = $("#dAmount").val();
        var dMethodt = $("#dMethodt").val();
        var dFrom = $("#dFrom").val();
        var dReference = $("#dReference").val();
        var dTo = $("#dTo").val();

        $.ajax({
          method: "POST",
        //   url: 'deposit_request',
          data: {
            dAmount: dAmount,
            dMethodt: dMethodt,
            dFrom: dFrom,
            dReference: dReference,
            dTo: dTo
          },
          success: function(data) {

            if (data == 'deposit request succesful') {
              $('#deposit_load').hide();
              $('#errorDeposit').show();
              $('#errorDeposit').removeClass('alert-success');
              $('#errorDeposit').removeClass('alert-danger');
              $('#errorDeposit').addClass('alert-success');
              $('#alertDeposit').html("deposit request succesful");
              setTimeout(function() {
                $("#errorDeposit").hide();
                location.reload();
              }, 2000);


            } else if (data == '2') {
              $('#deposit_load').hide();
              $('#errorDeposit').show();
              $('#errorDeposit').removeClass('alert-success');
              $('#errorDeposit').removeClass('alert-danger');
              $('#errorDeposit').addClass('alert-danger');
              $('#alertDeposit').html(data);
              setTimeout(function() {
                $("#errorDeposit").hide();
              }, 2000);
              depositclick = 0;

            }

          }
        });
      }
    });
    //===========================withdraw request================================
    var withdrawclick = 0;
    $("#withdrawSubmit").on("click", function() {
      withdrawclick = withdrawclick + 1;
      if (withdrawclick == 1) {
        $('#withdraw_load').show();
        var wAmount = $("#wAmount").val();
        var wMethod = $("#wMethod").val();
        var wType = $("#wType").val();
        var wTo = $("#wTo").val();
        var personal_user_id = $("#personal_user_id").val();
        personal_user_id
        $.ajax({
          method: "POST",
        //   url: 'withdraw_request',
          data: {
            wAmount: wAmount,
            wMethod: wMethod,
            wType: wType,
            wTo: wTo,
            personal_user_id: personal_user_id
          },
          success: function(data) {

            if (data == "Withdraw Request Complete") {
              $('#withdraw_load').hide();
              $('#errorWithdraw').show();
              $('#errorWithdraw').removeClass('alert-success');
              $('#errorWithdraw').removeClass('alert-danger');
              $('#errorWithdraw').addClass('alert-success');
              $('#alertWithdraw').html(data);

              setTimeout(function() {
                $("#errorWithdraw").hide();
                location.reload();
              }, 2000);
            } else {
              $('#withdraw_load').hide();
              $('#errorWithdraw').show();
              $('#errorWithdraw').removeClass('alert-success');
              $('#errorWithdraw').removeClass('alert-danger');
              $('#errorWithdraw').addClass('alert-danger');
              $('#alertWithdraw').html(data);
              withdrawclick = 0;
              setTimeout(function() {
                $("#errorWithdraw").hide();
              }, 3000000);


            }

          }
        });
      }

    });

    $("#changeClubSubmit").on("click", function() {


      var cClub = $("#cClub").val();
      var PasswordClubChange = $("#PasswordClubChange").val();

      $.ajax({
        method: "POST",
        // url: 'change_club',
        data: {
          cClub: cClub,
          PasswordClubChange: PasswordClubChange

        },
        success: function(data) {

          if (data == "Club Changed") {

            $('#errorClub').show();
            $('#errorClub').removeClass('alert-success');
            $('#errorClub').removeClass('alert-danger');
            $('#errorClub').addClass('alert-success');
            $('#alertClub').html(data);

            setTimeout(function() {
              $("#errorClub").hide();
            }, 3000);
          } else {

            $('#errorClub').show();
            $('#errorClub').removeClass('alert-success');
            $('#errorClub').removeClass('alert-danger');
            $('#errorClub').addClass('alert-danger');
            $('#alertClub').html(data);

            setTimeout(function() {
              $("#errorClub").hide();
            }, 3000);


          }
        }
      });


    });

    // ============================================= START CHANGES PASSOWORD ====================================================

    $("#changePasswordSubmit").on("click", function() {


      var currentPassword = $("#currentPassword").val();
      var newPassword = $("#newPassword").val();
      var confirmPassword = $("#confirmPasswordAgain").val();

      $.ajax({
        method: "get",
        url: "{{ route('profiles.changepassword') }}",
        data: {

          currentPassword: currentPassword,
          newPassword: newPassword,
          confirmPassword: confirmPassword
        },
        success: function(data) {
            console.log(data);
          if (data == "Password Updated") {

            $('#errorPassword').show();
            $('#errorPassword').removeClass('alert-success');
            $('#errorPassword').removeClass('alert-danger');
            $('#errorPassword').addClass('alert-success');
            $('#alertPassword').html(data);

            setTimeout(function() {
              $("#errorPassword").hide();
            }, 3000);
          } else {

            $('#errorPassword').show();
            $('#errorPassword').removeClass('alert-success');
            $('#errorPassword').removeClass('alert-danger');
            $('#errorPassword').addClass('alert-danger');
            $('#alertPassword').html(data);

            setTimeout(function() {
              $("#errorPassword").hide();
            }, 3000);
          }
        }
      });
    });
    // ============================================= END CHANGES PASSOWORD ====================================================

    // ===============================================START FORGET PASSWORD ====================================
    $("#confirmEmailSubmit").on("click", function() {

        var email = $("#confirmEmail").val();
        // console.log(email);
        $.ajax({
        method: "GET",
        url: "{{ route('profiles.forgetPass') }}",
        data: {
            email: email,
        },
        success: function(data) {
            console.log(data);
            if (data == "1") {
            $('#withdraw').modal('toggle');
            $('#passwordverify').modal('hide');
            $('#withdraw').modal('show');

            } else {
            $('#errorpasswordconfirm').show();
            $('#errorpasswordconfirm').removeClass('alert-success');
            $('#errorpasswordconfirm').removeClass('alert-danger');
            $('#errorpasswordconfirm').addClass('alert-danger');
            $('#alertconfirmpassword').html("Password not mtched");

            setTimeout(function() {
                $("#errorpasswordconfirm").hide();
            }, 3000);
            }
        }
        });
    });
    // ===============================================END FORGET PASSWORD ====================================



    $("#confirmpasswordSubmit").on("click", function() {

      var password = $("#confirmpassword").val();

      $.ajax({
        method: "POST",
        // url: 'confirmpassword',
        data: {
          password: password,

        },
        success: function(data) {
          if (data == "1") {
            $('#withdraw').modal('toggle');
            $('#passwordverify').modal('hide');
            $('#withdraw').modal('show');

          } else {
            $('#errorpasswordconfirm').show();
            $('#errorpasswordconfirm').removeClass('alert-success');
            $('#errorpasswordconfirm').removeClass('alert-danger');
            $('#errorpasswordconfirm').addClass('alert-danger');
            $('#alertconfirmpassword').html("Password not mtched");

            setTimeout(function() {
              $("#errorpasswordconfirm").hide();
            }, 3000);


          }
        }
      });


    });


    // =========   BET OPTION ===================== (Not My Approach: its developers approach)
    var show = 1;
    var bettingTitle = "";

    var bettingSubTitle = "";
    var BettingSubTitleOption = "";
    $(document).on('click', '.data-show', function() {
      //$("#data-show").on("click", function () {
      bettingTitle = $(this).attr('bettingTitle');

      bettingSubTitle = $(this).attr('bettingSubTitle');
      BettingSubTitleOption = $(this).attr('BettingSubTitleOption');

      var gameType = $(this).attr('gameType');
      var gameStatus = $(this).attr('gameStatus');

      $("#stakeAmount").val(100.00);
      if (gameStatus == 1) {

        $("#gameLiveOrUpcoming").text('Live');
        $("#gameLiveOrUpcoming").css("background", "#ec5d18");

      } else {
        $("#gameLiveOrUpcoming").text('Upcoming');
        $("#gameLiveOrUpcoming").css("background", "#6918ec");
      }

      if (gameType == 1) {
        $('#gameLogo').attr('src', 'frontend/img/1393757333.png');
      } else if (gameType == 2) {
        $('#gameLogo').attr('src', 'frontend/img/ka-pl.png');
      } else if (gameType == 3) {
        $('#gameLogo').attr('src', 'frontend/img/basket.png');
      } else if (gameType == 4) {
        $('#gameLogo').attr('src', 'frontend/img/boxing.png');
      } else if (gameType == 5) {
        $('#gameLogo').attr('src', 'frontend/img/tenis.png');
      } else if (gameType == 6) {
        $('#gameLogo').attr('src', 'frontend/img/h.png');
      } else if (gameType == 7) {
        $('#gameLogo').attr('src', 'frontend/img/badminton.png');
      } else if (gameType == 8) {
        $('#gameLogo').attr('src', 'frontend/img/ice_hockey.png');
      } else if (gameType == 9) {
        $('#gameLogo').attr('src', 'frontend/img/handball.png');

      } else if (gameType == 10) {
        $('#gameLogo').attr('src', 'frontend/img/baseball.png');
      } else if (gameType == 11) {
        $('#gameLogo').attr('src', 'frontend/img/rugbyball.png');
      } else if (gameType == 12) {
        $('#gameLogo').attr('src', 'frontend/img/snooker.png');

      } else if (gameType == 13) {
        $('#gameLogo').attr('src', 'frontend/img/dart.png');
      } else if (gameType == 14) {
        $('#gameLogo').attr('src', 'frontend/img/table_tenis.png');
      } else if (gameType == 15) {
        $('#gameLogo').attr('src', 'frontend/img/beach_volley.png');
      } else if (gameType == 16) {
        $('#gameLogo').attr('src', 'frontend/img/floorball.png');
      } else if (gameType == 17) {
        $('#gameLogo').attr('src', 'frontend/img/bandy.png');
      }
      //alert(bettingTitle + " " + bettingSubTitle + " " + BettingSubTitleOption);
      $.ajax({
        method: "POST",
        // url: 'betfacedata',
        dataType: 'JSON',
        data: {
          bettingTitle: bettingTitle,
          bettingSubTitle: bettingSubTitle,
          BettingSubTitleOption: BettingSubTitleOption
        },
        success: function(data) {
          //  alert(data.BettingSubTitleOption);
          $("#BettingSubTitleOption").text(data.BettingSubTitleOption);
          $("#bettingSubTitle").text(data.bettingSubTitle);
          $("#betRateShow").text(data.betRate);
          $("#bettingTitle").text(data.bettingTitle);
          /* set hidden value*/
          $("#match").val(data.bettingSubTitle);
          $("#matchBet").val(data.BettingSubTitleOption);
          $("#betRate").val(data.betRate);
          $("#betId").val(BettingSubTitleOption);
          $("#matchId").val(bettingTitle);
          $("#betTitleId").val(bettingSubTitle);

          var st = data.betRate * 100.00;
          $("#possibleAmount").text(st.toFixed(2));
        }
      });


    });



    $("#stakeAmount").keyup(function() {
      var stakeAmount = $(this).val();
      var betRate = $("#betRate").val();
      $("#stakeAmountView").text(stakeAmount);
      var st = stakeAmount * betRate;
      $("#possibleAmount").text(st.toFixed(2));
    });

    var betclick = 0;
    $("#placeBet").on("click", function() {
      betclick = betclick + 1;
      if (betclick == 1) {
        var match = $("#match").val();
        var matchBet = $("#matchBet").val();
        var betRate = $("#betRate").val();
        var stakeAmount = $("#stakeAmount").val();
        var betId = $("#betId").val();
        var matchId = $("#matchId").val();
        var betTitleId = $("#betTitleId").val();

        //$("#placeBet").addClass("hideplace");
        $("#load").removeClass("load");
        $.ajax({
          method: "POST",
        //   url: 'place_bet',
          data: {
            match: match,
            matchBet: matchBet,
            betRate: betRate,
            stakeAmount: stakeAmount,
            betId: betId,
            matchId: matchId,
            betTitleId: betTitleId
          },
          success: function(data) {

            if (data !== "") {

              if (data == "Bet Placed Successfully") {

                $('#errorBet').show();
                $('#errorBet').removeClass('alert-success');
                $('#errorBet').removeClass('alert-danger');
                $('#errorBet').addClass('alert-success');
                $('#alertBet').html(data);

                setTimeout(function() {
                  $("#errorBet").hide();
                  $(".betForm").hide();
                  location.reload();
                }, 1000);
              } else {

                $('#errorBet').show();
                $('#errorBet').removeClass('alert-success');
                $('#errorBet').removeClass('alert-danger');
                $('#errorBet').addClass('alert-danger');
                $('#alertBet').html(data);
                betclick = 0;
                setTimeout(function() {

                  $("#errorBet").hide();


                }, 1000);


              }
            } else {


              //$(".betForm").hide();
              // location.reload();
            }
          }
        });
        /*  setTimeout(
         function () {

         },1);*/
      }
    });

    var click = 0;

    $("#balanceTransferSubmit").on("click", function() {

      click = click + 1;

      if (click == 1) {
        $('#balance_transfer_load').show();
        var transferAmount = $("#transferAmount").val();
        var to_userId = $("#to_userId").val();
        var notes = $("#notes").val();
        var transferPassword = $("#transferPassword").val();

        $.ajax({
          method: "POST",
        //   url: 'usertouserbalancetransfer',
          data: {
            amount: transferAmount,
            toUser: to_userId,
            notes: notes,
            transferPassword: transferPassword

          },
          success: function(data) {

            if (data !== "") {

              if (data == "User To User Balance transfer Successful") {

                $('#balance_transfer_load').hide();
                $('#errorBalanceTransfer').show();
                $('#errorBalanceTransfer').removeClass('alert-success');
                $('#errorBalanceTransfer').removeClass('alert-danger');
                $('#errorBalanceTransfer').addClass('alert-success');
                $('#alertBalanceTransfer').html(data);

                setTimeout(function() {
                  $("#errorBalanceTransfer").hide();
                  $(".balanceTransfer").hide();
                  location.reload();
                }, 2000);
              } else {
                $('#balance_transfer_load').hide();
                $('#errorBalanceTransfer').show();
                $('#errorBalanceTransfer').removeClass('alert-success');
                $('#errorBalanceTransfer').removeClass('alert-danger');
                $('#errorBalanceTransfer').addClass('alert-danger');
                $('#alertBalanceTransfer').html(data);
                click = 0;
                setTimeout(function() {
                  $("#errorBalanceTransfer").hide();
                }, 2000);
              }

            }
          }
        });
      }

    });
    var click = 0;

    $("#balanceTransferSubmitclub").on("click", function() {

      click = click + 1;

      if (click == 1) {
        $('#balance_transfer_loadclub').show();
        var transferAmount = $("#transferAmountclub").val();
        var to_userId = $("#toclub").val();
        //var notes = $("#notes").val();
        var transferPassword = $("#transferPasswordclub").val();

        $.ajax({
          method: "POST",
        //   url: 'usertoclubbalancetransfer',
          data: {
            amount: transferAmount,
            toUser: to_userId,

            transferPassword: transferPassword

          },
          success: function(data) {
            if (data !== "") {
              if (data == "Balance transfer Successful") {

                $('#balance_transfer_loadclub').hide();
                $('#errorBalanceTransferclub').show();
                $('#errorBalanceTransferclub').removeClass('alert-success');
                $('#errorBalanceTransferclub').removeClass('alert-danger');
                $('#errorBalanceTransferclub').addClass('alert-success');
                $('#alertBalanceTransferclub').html(data);

                setTimeout(function() {
                  $("#errorBalanceTransferclub").hide();
                  $(".balanceTransfer").hide();
                  location.reload();
                }, 2000);
              } else {
                $('#balance_transfer_load').hide();
                $('#errorBalanceTransferclub').show();
                $('#errorBalanceTransferclub').removeClass('alert-success');
                $('#errorBalanceTransferclub').removeClass('alert-danger');
                $('#errorBalanceTransferclub').addClass('alert-danger');
                $('#alertBalanceTransferclub').html(data);
                click = 0;
                setTimeout(function() {
                  $("#errorBalanceTransferclub").hide();
                }, 2000);
              }
            }
          }
        });
      }

    });

    var click = 0;
    $("#balanceTransferSubmituser").on("click", function() {
      click = click + 1;
      if (click == 1) {
        $('#balance_transfer_loaduser').show();
        var transferAmount = $("#transferAmountuser").val();
        var to_userId = $("#to_userIduser").val();
        //var notes = $("#notes").val();
        var transferPassword = $("#transferPassworduser").val();

        $.ajax({
          method: "POST",
        //   url: 'clubtouserbbalancetransfer',
          data: {
            amount: transferAmount,
            toUser: to_userId,
            transferPassword: transferPassword
          },
          success: function(data) {
            alert(data);
            if (data !== "") {
              if (data == "Club To User Balance transfer Successful") {
                $('#balance_transfer_loaduser').hide();
                $('#errorBalanceTransferuser').show();
                $('#errorBalanceTransferuser').removeClass('alert-success');
                $('#errorBalanceTransferuser').removeClass('alert-danger');
                $('#errorBalanceTransferuser').addClass('alert-success');
                $('#alertBalanceTransferuser').html(data);

                setTimeout(function() {
                  $("#errorBalanceTransferclub").hide();
                  $(".balanceTransfer").hide();
                  location.reload();
                }, 2000);
              } else {
                $('#balance_transfer_loaduser').hide();
                $('#errorBalanceTransferuser').show();
                $('#errorBalanceTransferuser').removeClass('alert-success');
                $('#errorBalanceTransferuser').removeClass('alert-danger');
                $('#errorBalanceTransferuser').addClass('alert-danger');
                $('#alertBalanceTransferuser').html(data);
                click = 0;

                setTimeout(function() {

                  $("#errorBalanceTransferuser").hide();
                }, 2000);
              }
            }
          }
        });
      }

    });

    $('#200').click(function(event) {
      $('#stakeAmount').val('200');
      returnamount('200')

    });
    $('#500').click(function(event) {
      $('#stakeAmount').val('500');
      returnamount('500')

    });
    $('#1000').click(function(event) {
      $('#stakeAmount').val('1000');
      returnamount('1000')

    });
    $('#3000').click(function(event) {
      $('#stakeAmount').val('3000');
      returnamount('3000')

    });
    $('#5000').click(function(event) {
      $('#stakeAmount').val('5000');
      returnamount('5000')

    });

    function returnamount(stakeamount) {
      var stakeAmount = stakeamount;
      var betRate = $("#betRate").val();
      $("#stakeAmountView").text(stakeAmount);
      var st = stakeAmount * betRate;
      $("#possibleAmount").text(st.toFixed(2));
    }


    $('#ticketsubmit').click(function() {

      var subject = $('#ticket_subject').val();
      var message = $('#ticket_message').val();
      $.ajax({

        type: 'POST',

        // url: 'new_ticket',

        data: {
          subject: subject,
          message: message
        },

        success: function(data) {

          if (data != '') {

            if (data == 'Your Ticket Submited Successfully') {

              $('#hide').show();
              $('#hide').removeClass('alert-success');
              $('#hide').removeClass('alert-danger');
              $('#hide').addClass('alert-success');
              $('#ticket-message').html(data);
              $("#chatbox").load('chatticket');
              setTimeout(function() {

                $("#hide").hide();


              }, 2000);
            } else {
              $('#hide').show();
              $('#hide').removeClass('alert-success');
              $('#hide').removeClass('alert-danger');
              $('#hide').addClass('alert-danger');
              $('#ticket-message').html(data);
              setTimeout(function() {

                $("#hide").hide();


              }, 2000);
            }
          }
        }

      });
    });


    $("#chatbox").load('chatticket');


    $('#reply_submit').click(function() {

      var message = $('#reply_message').val();
      var ticket_id = $('#ticket_id').val();
      $.ajax({

        type: 'POST',

        // url: 'reply_message',

        data: {
          message: message,
          ticket_id: ticket_id
        },

        success: function(data) {

          if (data != '') {
            $("#chatbox").load('chatticket');
            $('#reply_message').val('');
          }
        }

      });
    });

    //=====================cancel withdraw==============================

    var click = 0;

    function cancelwithdraw(id) {

      click = click + 1;

      if (click == 1) {
        $('#cancelwithdraw_load').show();
        $.ajax({

          type: 'POST',

        //   url: 'cancelwithdraw',

          data: {
            id: id
          },

          success: function(data) {


            if (data == 'Withdraw canceled Successfully') {
              $('#cancelwithdraw_load').hide();
              $('#cancelwithdraw').show();
              $('#cancelwithdraw').removeClass('alert-success');
              $('#cancelwithdraw').removeClass('alert-danger');
              $('#cancelwithdraw').addClass('alert-success');
              $('#cancelwithdraw-alert').html(data);

              setTimeout(function() {

                $("#cancelwithdraw").hide();
                location.reload();

              }, 2000);
            } else {
              click = 0;
              $('#cancelwithdraw_load').hide();
              $('#cancelwithdraw').show();
              $('#cancelwithdraw').removeClass('alert-success');
              $('#cancelwithdraw').removeClass('alert-danger');
              $('#cancelwithdraw').addClass('alert-danger');
              $('#cancelwithdraw-alert').html(data);

              setTimeout(function() {

                $("#cancelwithdraw").hide();


              }, 2000);
            }
          }

        });
      }
    }
</script>

<script>
    $(document).ready(function() {
      $('.itemSlider').owlCarousel({
        margin: 0,
        loop: true,
        autoplay: true,
        autoplayTimeout: 4000,
        nav: true,
        smartSpeed: 800,
        dots: false,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
          0: {
            items: 4
          },
          450: {
            items: 4
          },
          768: {
            items: 5
          },
          1000: {
            items: 6
          }
        }
      });
    });
</script>

<script>
    $("#menu").eosMenu();
</script>

{{-- <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script');
      ga.type = 'text/javascript';
      ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(ga, s);
    })();

    $('#tapbalance').click(function(event) {
      $('#tbalance2').hide();
      $('#tbalance').show();
      setTimeout(function() {

        $("#tbalance").hide();

        $("#tbalance2").show();
      }, 2000);
    });

    $('#show_deposit_notice').click(function(event) {
      $('#deposit_notice').fadeIn('slow/900/fast', function() {

      });

      setTimeout(function() {
        $("#deposit_notice").fadeOut('slow/400/fast', function() {

        });
      }, 10000);


    });
    $('#show_withdraw_notice').click(function(event) {
      $('#withdraw_notice').fadeIn('slow/900/fast', function() {

      });

      setTimeout(function() {


        $("#withdraw_notice").fadeOut('slow/400/fast', function() {

        });
      }, 10000);

    });
    //one ten game
    $('#stakeAmountoneten').keyup(function() {
      var stake = $('#stakeAmountoneten').val();
      $('#onetentotalstake').html(stake);
      var first = stake * 3;
      var second = stake * 2.5;
      var third = stake * 2;
      $('#possibleAmount1').html(first);
      $('#possibleAmount2').html(second);
      $('#possibleAmount3').html(third);
    });
    var games_id = "";
    var options_id = "";

    function option_select(game_id, option_id, option_no) {
      games_id = game_id;
      options_id = option_id;
      $('#select_option').html(option_no);
    }
    $(document).ready(function() {
      $('#oneten_placebet').click(function(event) {
        var stake = $('#stakeAmountoneten').val();
        if (stake == "") {
          alert('Give stake amount');
        } else {
          if (options_id == "") {
            alert('select an option')
          } else {
            $.ajax({
              method: "POST",
            //   url: 'oneten_betplace',

              data: {
                game_id: games_id,
                option_id: options_id,
                stake: stake
              },
              success: function(data) {

                if (data == "Bet Placed Successfuly") {

                  $('#errorBetoneten').show();
                  $('#errorBetoneten').removeClass('alert-success');
                  $('#errorBetoneten').removeClass('alert-danger');
                  $('#errorBetoneten').addClass('alert-success');
                  $('#alertBetoneten').html(data);

                  setTimeout(function() {
                    $("#errorBetoneten").hide();
                    $(".betForm").hide();
                    location.reload();
                  }, 1000);
                } else {

                  $('#errorBetoneten').show();
                  $('#errorBetoneten').removeClass('alert-success');
                  $('#errorBetoneten').removeClass('alert-danger');
                  $('#errorBetoneten').addClass('alert-danger');
                  $('#alertBetoneten').html(data);
                  betclick = 0;
                  setTimeout(function() {

                    $("#errorBetoneten").hide();
                  }, 1000);

                }

              }
            });
          }
        }

      });

    });
    // oneten_refresh
    // setInterval(function() {
    //   $.ajax({
    //     method: "POST",
    //     url: 'oneten_refresh',
    //     data: {
    //       wAmount: '1'
    //     },
    //     success: function(data) {
    //       // console.log(data);

    //       if (data === "1") {
    //         location.reload();

    //       }
    //     }
    //   });
    // }, 8000);

    $('#200a').click(function(event) {
      $('#stakeAmountoneten').val('200');
      var stake = $('#stakeAmountoneten').val();
      $('#onetentotalstake').html(stake);
      var first = stake * 3;
      var second = stake * 2.5;
      var third = stake * 2;
      $('#possibleAmount1').html(first);
      $('#possibleAmount2').html(second);
      $('#possibleAmount3').html(third);

    });
    $('#500a').click(function(event) {
      $('#stakeAmountoneten').val('500');
      var stake = $('#stakeAmountoneten').val();
      $('#onetentotalstake').html(stake);
      var first = stake * 3;
      var second = stake * 2.5;
      var third = stake * 2;
      $('#possibleAmount1').html(first);
      $('#possibleAmount2').html(second);
      $('#possibleAmount3').html(third);

    });
    $('#1000a').click(function(event) {
      $('#stakeAmountoneten').val('1000');
      var stake = $('#stakeAmountoneten').val();
      $('#onetentotalstake').html(stake);
      var first = stake * 3;
      var second = stake * 2.5;
      var third = stake * 2;
      $('#possibleAmount1').html(first);
      $('#possibleAmount2').html(second);
      $('#possibleAmount3').html(third);

    });
    $('#3000a').click(function(event) {
      $('#stakeAmountoneten').val('3000');
      var stake = $('#stakeAmountoneten').val();
      $('#onetentotalstake').html(stake);
      var first = stake * 3;
      var second = stake * 2.5;
      var third = stake * 2;
      $('#possibleAmount1').html(first);
      $('#possibleAmount2').html(second);
      $('#possibleAmount3').html(third);

    });
    $('#5000a').click(function(event) {
      $('#stakeAmountoneten').val('5000');
      var stake = $('#stakeAmountoneten').val();
      $('#onetentotalstake').html(stake);
      var first = stake * 3;
      var second = stake * 2.5;
      var third = stake * 2;
      $('#possibleAmount1').html(first);
      $('#possibleAmount2').html(second);
      $('#possibleAmount3').html(third);

    });

    $('#add_multibet').click(function(event) {
      $.ajax({
        method: "POST",
        url: 'betfacedata_2',
        //dataType: 'JSON',
        data: {
          bettingTitle: bettingTitle,
          bettingSubTitle: bettingSubTitle,
          BettingSubTitleOption: BettingSubTitleOption
        },
        success: function(data) {

          $.ajax({
            method: "GET",
            // url: 'get_bet_slip',
            data: {
              uid: 'ss'
            },
            success: function(datas) {

              if (data == '1') {
                $("#bet_slip").load('bet_slip');
                $('#bet_slip_div').css('display', 'block');

                show = 0;

              } else {
                alert(data);
                $("#bet_slip").load('bet_slip');
              }
            }
          });
        }
      });

      count_multi();

    });

    function delete_bet_slip(id) {
      $.ajax({
        method: "POST",
        // url: 'delete_bet_slip',
        data: {
          id: id
        },
        success: function(data) {
          if (data == '1') {

            $("#bet_slip").load('bet_slip');
            count_multi();
          }
        }
      });

    }



    // ============================BET SECTION ===========================
    function seect_option(a, b, c)
    {
      if (multi == 0)
      {
        $('#betting').modal('show');
      }
      else
      {
        $.ajax({
          method: "POST",
          url: 'betfacedata_2',
          //dataType: 'JSON',
          data: {
            bettingTitle: a,
            bettingSubTitle: b,
            BettingSubTitleOption: c
          },
          success: function(data) {

            $.ajax({
              method: "GET",
            //   url: 'get_bet_slip',
              data: {
                uid: 'ss'
              },
              success: function(datas) {

                if (data == '1')
                {
                  $("#bet_slip").load('bet_slip');
                  $('#bet_slip_div').css('display', 'block');
                  show = 0;
                  count_multi();

                }
                else
                {
                  alert(data);
                  $("#bet_slip").load('bet_slip');
                }
              }
            });
          }
        });

      }
    }

    function count_multi() {
      $.ajax({
        method: "GET",
        // url: 'count_bet_slip',
        data: {
          id: "id"
        },
        success: function(data) {
          $('#betslip_toolkit').show();
          $('#total_multi').html(data);

        }
      });
    }
</script> --}}



<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="9ad5efd2fa5d14655f988626-|49" defer="">
</script>

  <!-- END  COMMON FILES -->



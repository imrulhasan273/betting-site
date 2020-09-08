<script type="text/javascript">

// ===================Auto Refresh Page=================
// setTimeout(function()
// {
//     location.reload();
// }, 10000);

$('#betting').on('show.bs.modal', function (event) {

    // ============ get all the data from games ================
    var button = $(event.relatedTarget)
    var type_id = button.data('type_id');
    var match = button.data('match');
    var status = button.data('status');
    var ques = button.data('ques');
    var ans = button.data('ans');
    var bet_rate = button.data('ans_bet_rate');

    //Extra values for identification
    let game_id = button.data('game_id');
    let ques_id = button.data('ques_id');
    let ans_id = button.data('ans_id');

    // ============= Get the html value from Modal ================
    returnamount('100')

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
      var betRate = bet_rate;
      $("#stakeAmountView").text(stakeAmount);
      var PossWinning = stakeAmount * betRate;
      $("#possibleAmount").text(PossWinning.toFixed(2));
    }

    //========== Show All the datas in the Modal ===========
    var modal = $(this);
    modal.find('.bettingTitle').html(match);
    modal.find('.gameLiveOrUpcoming').html(status);
    modal.find('#bettingSubTitle').html(ques);
    modal.find('#BettingSubTitleOption').html(ans);
    modal.find('#betRateShow').html(bet_rate);

    //  Extra Values sent to Modal for identity
    modal.find('#gameID').val(game_id);
    modal.find('#quesID').val(ques_id);
    modal.find('#ansID').val(ans_id);

    if (status == 'live') {
        $(".gameLiveOrUpcoming").css("background", "#ec5d18");
    } else {
        $(".gameLiveOrUpcoming").css("background", "#6918ec");
    }

    if (type_id == "1") {
        $('#gameLogo').attr('src', "{{asset('frontend/img/ka-pl.png')}}");
    } else if (type_id == "2") {
        $('#gameLogo').attr('src', "{{asset('frontend/img/1393757333.png')}}");
    } else if (type_id == "3") {
        $('#gameLogo').attr('src', "{{asset('frontend/img/BB.png')}}");
    } else if (type_id == "4") {
        $('#gameLogo').attr('src', "{{asset('frontend/img/T.png')}}");
    } else if (type_id == "5") {
        $('#gameLogo').attr('src', "{{asset('frontend/img/TT.png')}}");
    } else if (type_id == "6") {
        $('#gameLogo').attr('src', "{{asset('frontend/img/BN.png')}}");
    }
})

// ========== WHEN PLACE A BET ===> Send all the data to server using Ajax ===========

var betclick = 0;
$("#placeBet").on("click", function() {
    betclick = betclick + 1;
    if (betclick == 1)
    {
        console.log('BET PLACED - ');
        var gameID = $("#gameID").val();
        var quesID = $("#quesID").val();
        var ansID = $("#ansID").val();
        var BETreturnRate = $("#betRateShow").text();
        var BETamount = $("#stakeAmount").val();
        var match = $("#bettingTitle").text();


        // console.log(gameID);
        // console.log(quesID);
        // console.log(ansID);
        // console.log(BETreturnRate);
        // console.log(BETamount);
        // console.log(match);


        $("#placeBet").addClass("hideplace");
        // $("#load").removeClass("load");

        $.ajax({
            method: "get",
            url: "{{ route('bets.placeBit') }}",
            data: {
                gameID: gameID,
                quesID: quesID,
                ansID: ansID,
                BETreturnRate: BETreturnRate,
                BETamount: BETamount,
                match : match,
            },

            success: function(data)
            {
                console.log('return: ');
                console.log(data);

                if (data !== "")
                {
                    if (data == "Bit has been placed successfully!")
                    {
                        $('#errorBet').show();
                        $('#errorBet').removeClass('alert-success');
                        $('#errorBet').removeClass('alert-danger');
                        $('#errorBet').addClass('alert-success');
                        $('#alertBet').html(data);

                        setTimeout(function()
                        {
                            $("#errorBet").hide();
                            $(".betForm").hide();
                            location.reload();
                        }, 1000);
                    }
                    else if(data == "Insufficient Balance"){
                        $('#errorBet').show();
                        $('#errorBet').removeClass('alert-success');
                        $('#errorBet').removeClass('alert-danger');
                        $('#errorBet').addClass('alert-danger');
                        $('#alertBet').html(data);
                        betclick = 0;
                        setTimeout(function()
                        {
                            $("#errorBet").hide();
                        }, 1000);
                    }
                    else if(data == "guest"){
                        $('#errorBet').show();
                        $('#errorBet').removeClass('alert-success');
                        $('#errorBet').removeClass('alert-danger');
                        $('#errorBet').addClass('alert-danger');
                        $('#alertBet').html('Please Log In To Bit');
                        betclick = 0;
                        setTimeout(function()
                        {
                            $("#errorBet").hide();
                        }, 1000);
                    }
                    else if(data == "no club"){
                        $('#errorBet').show();
                        $('#errorBet').removeClass('alert-success');
                        $('#errorBet').removeClass('alert-danger');
                        $('#errorBet').addClass('alert-danger');
                        $('#alertBet').html('Please Register Your Account In A club Before Play!!');
                        betclick = 0;
                        setTimeout(function()
                        {
                            $("#errorBet").hide();
                        }, 4000);
                    }
                    else if(data == "admin" || data == 'super_admin' || data == 'club_admin'){
                        $('#errorBet').show();
                        $('#errorBet').removeClass('alert-success');
                        $('#errorBet').removeClass('alert-danger');
                        $('#errorBet').addClass('alert-danger');
                        $('#alertBet').html(data+' Can Not Play!!!');
                        betclick = 0;
                        setTimeout(function()
                        {
                            $("#errorBet").hide();
                        }, 4000);
                    }
                    else
                    {
                        $('#errorBet').show();
                        $('#errorBet').removeClass('alert-success');
                        $('#errorBet').removeClass('alert-danger');
                        $('#errorBet').addClass('alert-danger');
                        $('#alertBet').html(data);
                        betclick = 0;
                        setTimeout(function()
                        {
                            $("#errorBet").hide();
                        }, 1000);
                    }
                }
                else
                {
                    $(".betForm").hide();
                    location.reload();
                }
            }
        });
    }
});
</script>

<script type="text/javascript">


// ------============= change bet rate Submit ===================---------
    $("#changeBetSubmit").on("click", function() {

        $('#deposit_load').show();
        var bet_rate = $("#change_bet_rate").val();
        var bet_ans_id = $("#bet_ans_id").val();
        console.log(bet_rate);
        console.log(bet_ans_id);

        $.ajax({
            method: "get",
            url: "{{ route('betRate.change' )}}",
            data: {
                bet_rate: bet_rate,
                ans_id: bet_ans_id
            },

            success: function(data) {

                if(data=="not_numeric"){
                    $('#errorChangeBet').show();
                    $('#errorerrorChangeBetBet').removeClass('alert-success');
                    $('#errorChangeBet').removeClass('alert-danger');
                    $('#errorChangeBet').addClass('alert-danger');
                    $('#errorChangeBet').html("Invalid Type of Bet Rate");
                    setTimeout(function()
                    {
                        $("#errorChangeBet").hide();
                    }, 1000);
                }
                else{
                    console.log(data);
                    var AID = data[0];
                    var BR = data[1];
                    $('#ans_id_'+AID).text(BR);
                    setTimeout(function()
                    {
                        // $("#errorChangeBet").hide();
                    }, 1000);
                }

            }
        });
    });
</script>



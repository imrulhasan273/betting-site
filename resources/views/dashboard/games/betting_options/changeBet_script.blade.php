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

                console.log(data);

                // if (data == 'insert') {
                // $('#deposit_load').hide();
                // $('#errorDeposit').show();
                // $('#errorDeposit').removeClass('alert-success');
                // $('#errorDeposit').removeClass('alert-danger');
                // $('#errorDeposit').addClass('alert-success');
                // $('#alertDeposit').html("deposit request succesful");
                // setTimeout(function() {
                //     $("#errorDeposit").hide();
                //     location.reload();
                // }, 2000);
                // }
            }
        });
    });
</script>

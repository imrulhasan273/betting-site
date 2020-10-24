<script type="text/javascript">

    $("#changeBetSubmit").on("click", function() {

        $('#deposit_load').show();
        var bet_rate = $("#change_bet_rate").val();
        console.log(bet_rate);

        $.ajax({
            method: "get",
            url: "{{route('deposits.place')}}",
            data: {
                method_id: bet_rate,
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

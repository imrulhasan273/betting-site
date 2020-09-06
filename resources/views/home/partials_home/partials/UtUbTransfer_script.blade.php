<script type="text/javascript">
    var click = 0;
    $("#balanceTransferSubmit").on("click", function() {

        click = click + 1;

        if (click == 1) {
            $('#balance_transfer_load').show();
            var transferAmount = $("#transferAmount").val();
            var user_name = $("#to_userId").val();
            var transferPassword = $("#transferPassword").val();

            console.log(transferAmount);
            console.log(user_name);
            console.log(transferPassword);

            $.ajax({
                method: "get",
                url:  "{{route('profiles.btransfer')}}",
                data: {
                    amount: transferAmount,
                    user_name: user_name,
                    password: transferPassword
                },

                success: function(data) {

                    if (data !== "") {

                    if (data == "sent") {

                        $('#balance_transfer_load').hide();
                        $('#errorBalanceTransfer').show();
                        $('#errorBalanceTransfer').removeClass('alert-success');
                        $('#errorBalanceTransfer').removeClass('alert-danger');
                        $('#errorBalanceTransfer').addClass('alert-success');
                        $('#alertBalanceTransfer').html('Balance transfer Successful');

                        setTimeout(function() {
                        $("#errorBalanceTransfer").hide();
                        $(".balanceTransfer").hide();
                        location.reload();
                        }, 2000);
                    } else if(data == "insufficient"){
                        $('#balance_transfer_load').hide();
                        $('#errorBalanceTransfer').show();
                        $('#errorBalanceTransfer').removeClass('alert-success');
                        $('#errorBalanceTransfer').removeClass('alert-danger');
                        $('#errorBalanceTransfer').addClass('alert-danger');
                        $('#alertBalanceTransfer').html('insufficient Balance');
                        click = 0;
                        setTimeout(function() {
                        $("#errorBalanceTransfer").hide();
                        }, 2000);
                    }
                    else if(data == "User Not Exist"){
                        $('#balance_transfer_load').hide();
                        $('#errorBalanceTransfer').show();
                        $('#errorBalanceTransfer').removeClass('alert-success');
                        $('#errorBalanceTransfer').removeClass('alert-danger');
                        $('#errorBalanceTransfer').addClass('alert-danger');
                        $('#alertBalanceTransfer').html('User Not Exist');
                        click = 0;
                        setTimeout(function() {
                        $("#errorBalanceTransfer").hide();
                        }, 2000);
                    }
                    else if(data == "Incorrect Pass"){
                        $('#balance_transfer_load').hide();
                        $('#errorBalanceTransfer').show();
                        $('#errorBalanceTransfer').removeClass('alert-success');
                        $('#errorBalanceTransfer').removeClass('alert-danger');
                        $('#errorBalanceTransfer').addClass('alert-danger');
                        $('#alertBalanceTransfer').html('Incorrect Password');
                        click = 0;
                        setTimeout(function() {
                        $("#errorBalanceTransfer").hide();
                        }, 2000);
                    }
                    else if(data == "incorrect amount"){
                        $('#balance_transfer_load').hide();
                        $('#errorBalanceTransfer').show();
                        $('#errorBalanceTransfer').removeClass('alert-success');
                        $('#errorBalanceTransfer').removeClass('alert-danger');
                        $('#errorBalanceTransfer').addClass('alert-danger');
                        $('#alertBalanceTransfer').html('Please Type Amount Correctly');
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
</script>

<script type="text/javascript">

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
</script>

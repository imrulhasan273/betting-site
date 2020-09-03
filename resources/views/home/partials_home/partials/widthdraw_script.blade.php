<script type="text/javascript">

    var WidthdrawClick = 0;
    $("#widthdrawSubmit").on("click", function() {

        WidthdrawClick = WidthdrawClick + 1;
        if (WidthdrawClick == 1) {
            $('#widthdraw_load').show();

            var method = $("#Wmethod").val();
            var type = $("#Wtype").val();
            var to = $("#Wto").val();
            var amount = $("#Wamount").val();

            // console.log(method);
            // console.log(type);
            // console.log(to);
            // console.log(amount);



            $.ajax({
            method: "get",
            url: "{{route('widthdraw.user.request')}}",
            data: {
                method: method,
                type: type,
                to: to,
                amount: amount,
            },

            success: function(data) {

                console.log(data);

                if (data == 'insert') {
                $('#widthdraw_load').hide();
                $('#errorDeposit').show();
                $('#errorDeposit').removeClass('alert-success');
                $('#errorDeposit').removeClass('alert-danger');
                $('#errorDeposit').addClass('alert-success');
                $('#alertDeposit').html("deposit request succesful");
                setTimeout(function() {
                    $("#errorDeposit").hide();
                    location.reload();
                }, 2000);

                } else if (data == 'failed') {
                $('#widthdraw_load').hide();
                $('#errorDeposit').show();
                $('#errorDeposit').removeClass('alert-success');
                $('#errorDeposit').removeClass('alert-danger');
                $('#errorDeposit').addClass('alert-danger');
                $('#alertDeposit').html(data);
                setTimeout(function() {
                    $("#errorDeposit").hide();
                }, 2000);
                WidthdrawClick = 0;

                }
            }
            });
        }
    });
</script>

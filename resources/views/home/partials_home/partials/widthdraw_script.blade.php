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

                $('#errorWidthdraw').show();
                $('#errorWidthdraw').removeClass('alert-success');
                $('#errorWidthdraw').removeClass('alert-danger');
                $('#errorWidthdraw').addClass('alert-success');
                $('#alertWidthdraw').html("Widthdraw request succesful");
                setTimeout(function() {
                    $("#errorWidthdraw").hide();
                    location.reload();
                }, 2000);

                } else if (data == 'failed') {
                $('#widthdraw_load').hide();
                $('#errorWidthdraw').show();
                $('#errorWidthdraw').removeClass('alert-success');
                $('#errorWidthdraw').removeClass('alert-danger');
                $('#errorWidthdraw').addClass('alert-danger');
                $('#alertWidthdraw').html('Widthdraw Request Failed');
                setTimeout(function() {
                    $("#errorWidthdraw").hide();
                }, 2000);
                WidthdrawClick = 0;

                }
                else if (data == 'Insufficient Balance') {
                $('#widthdraw_load').hide();
                $('#errorWidthdraw').show();
                $('#errorWidthdraw').removeClass('alert-success');
                $('#errorWidthdraw').removeClass('alert-danger');
                $('#errorWidthdraw').addClass('alert-danger');
                $('#alertWidthdraw').html(data);
                setTimeout(function() {
                    $("#errorWidthdraw").hide();
                }, 2000);
                WidthdrawClick = 0;
                }
                else if (data == "admin" || data == 'super_admin' || data == 'club_admin') {
                $('#widthdraw_load').hide();
                $('#errorWidthdraw').show();
                $('#errorWidthdraw').removeClass('alert-success');
                $('#errorWidthdraw').removeClass('alert-danger');
                $('#errorWidthdraw').addClass('alert-danger');
                $('#alertWidthdraw').html(data+' Can Not Widthdraw Here!!!');
                setTimeout(function() {
                    $("#errorWidthdraw").hide();
                }, 2000);
                WidthdrawClick = 0;
                }
            }
            });
        }
    });
</script>

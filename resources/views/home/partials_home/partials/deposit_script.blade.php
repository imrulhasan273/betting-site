<script type="text/javascript">

    //HERE IS THE SCRIPTS FOR DROPDOWN NUMBER FOR A METHOD
    $("#dMethodt").change(function() {

        var method_id = $("#dMethodt").val();
        // console.log(method_id);

        $.ajax({
            method: "GET",
            url: "{{ route('deposits.methods') }}",
            data: {
                method_id: method_id,
            },
            success: function(data) {
                // console.log('RESPONSE: ');
                // console.log(data);
                op='<option value="'+data+'">'+data+'</option>';
                $('#dTo').html(" ");
                $('#dTo').append(op);
            }
        });
    });
    // ______________________________________________________


    var depositclick = 0;
    $("#depositSubmit").on("click", function() {

        depositclick = depositclick + 1;
        if (depositclick == 1) {
            $('#deposit_load').show();

            var dMethodt = $("#dMethodt").val();
            var dTo = $("#dTo").val();
            var dFrom = $("#dFrom").val();
            var dAmount = $("#dAmount").val();
            var dReference = $("#dTrans").val();

            // console.log(dMethodt);
            // console.log(dTo);
            // console.log(dFrom);
            // console.log(dAmount);
            // console.log(dReference);


            $.ajax({
            method: "GET",
            url: "{{route('deposits.place')}}",
            data: {
                method_id: dMethodt,
                deposit_to: dTo,
                deposit_by: dFrom,
                amount: dAmount,
                transection_id: dReference
            },

            success: function(data) {

                console.log(data);

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

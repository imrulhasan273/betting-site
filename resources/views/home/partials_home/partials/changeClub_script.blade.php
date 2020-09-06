<script type="text/javascript">

$("#changeClubSubmit").on("click", function() {

    var clubID = $("#cClub").val();
    var clubChangePass = $("#clubChangePass").val();


    $.ajax({
        method: "get",
        url: "{{route('profiles.changeclub')}}",
        data: {
            clubID: clubID,
            password: clubChangePass
        },
        success: function(data) {

            if (data == "success") {
                $('#errorClub').show();
                $('#errorClub').removeClass('alert-success');
                $('#errorClub').removeClass('alert-danger');
                $('#errorClub').addClass('alert-success');
                $('#alertClub').html('Club Changed!!');

                setTimeout(function() {
                    $("#errorClub").hide();
                }, 3000);
            }
            else
            {
                $('#errorClub').show();
                $('#errorClub').removeClass('alert-success');
                $('#errorClub').removeClass('alert-danger');
                $('#errorClub').addClass('alert-danger');
                $('#alertClub').html('Incorrect Password!!');

                setTimeout(function() {
                    $("#errorClub").hide();
                }, 3000);
            }
        }
    });
});

</script>

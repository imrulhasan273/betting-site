<script type="text/javascript">


    // ------============= change bet rate Submit ===================---------
        $("#changeQuesSubmit").on("click", function() {

            $('#deposit_load').show();
            var quest = $("#change_quest").val();
            var quest_id = $("#quest_id").val();
            console.log(quest);
            console.log(quest_id);

            // $.ajax({
            //     method: "get",
            //     url: "{{ route('betRate.change' )}}",
            //     data: {
            //         bet_rate: bet_rate,
            //         ans_id: bet_ans_id
            //     },

            //     success: function(data) {

            //         if(data=="not_numeric"){
            //             $('#errorChangeBet').show();
            //             $('#errorerrorChangeBetBet').removeClass('alert-success');
            //             $('#errorChangeBet').removeClass('alert-danger');
            //             $('#errorChangeBet').addClass('alert-danger');
            //             $('#errorChangeBet').html("Invalid Type of Bet Rate");
            //             setTimeout(function()
            //             {
            //                 $("#errorChangeBet").hide();
            //             }, 1000);
            //         }
            //         else{
            //             console.log(data);
            //             var AID = data[0];
            //             var BR = data[1];
            //             $('#ans_id_'+AID).text(BR);
            //             setTimeout(function()
            //             {
            //                 // $("#errorChangeBet").hide();
            //             }, 1000);
            //         }

            //     }
            // });
        });
    </script>



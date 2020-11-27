<script type="text/javascript">

    // ------============= change Question Submit ===================---------
        $("#changeQuesSubmit").on("click", function() {

            $('#deposit_load').show();
            var quest = $("#change_quest").val();
            var quest_id = $("#quest_id").val();
            console.log(quest);
            console.log(quest_id);

            $.ajax({
                method: "get",
                url: "{{ route('quest.change' )}}",
                data: {
                    quest_id: quest_id,
                    quest: quest
                },

                success: function(data) {

                    console.log(data);
                    var QID = data[0];
                    var QUES = data[1];
                    $('#ques_id_'+QID).text(QUES);
                    setTimeout(function()
                    {
                        // $("#errorChangeBet").hide();
                    }, 1000);
                }
            });
        });
    </script>



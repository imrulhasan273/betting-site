<!--   Core JS Files   -->

{{-- added for MOBILE VIEW NAV--}}
<script src=" {{asset('backend/js/core/jquery.min.js')}} "></script>
<script src="{{ asset('backend/js/core/popper.min.js') }}"></script>
<script src=" {{asset('backend/js/core/bootstrap-material-design.min.js')}} "></script>
<script src=" {{asset('backend/js/plugins/perfect-scrollbar.jquery.min.js')}} "></script>
{{-- added for MOBILE VIEW NAV --}}



  <!-- Plugin for the momentJs  -->
  <script src=" {{asset('backend/js/plugins/moment.min.js')}} "></script>
  <!--  Plugin for Sweet Alert -->
  <script src=" {{asset('backend/js/plugins/sweetalert2.js')}} "></script>
  <!-- Forms Validations Plugin -->
  <script src=" {{asset('backend/js/plugins/jquery.validate.min.js')}} "></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src=" {{asset('backend/js/plugins/jquery.bootstrap-wizard.js')}} "></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('backend/js/plugins/bootstrap-selectpicker.js')}}"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{ asset('backend/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
<script src="{{asset('backend/js/plugins/jquery.dataTables.min.js')}}"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{asset('backend/js/plugins/bootstrap-tagsinput.js')}}"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('backend/js/plugins/jasny-bootstrap.min.js')}}"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="{{asset('backend/js/plugins/fullcalendar.min.js')}}"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="{{ asset('backend/js/plugins/jquery-jvectormap.js')}}"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{asset('backend/js/plugins/nouislider.min.js')}}"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src=" {{asset('backend/js/plugins/arrive.min.js')}} "></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src=" {{ asset('backend/js/plugins/chartist.min.js') }} "></script>
  <!--  Notifications Plugin    -->
  <script src=" {{asset('backend/js/plugins/bootstrap-notify.js')}} "></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src=" {{asset('backend/js/material-dashboard.js?v=2.1.2') }}" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src=" {{asset('backend/demo/demo.js')}} "></script>

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>





<!-- Added File for dropdown-->
<script src="{{asset('backend/assets/js/core/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('backend/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('backend/assets/js/core/bootstrap-material-design.min.js')}}"></script>
{{-- <script src="{{asset('backend/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script> --}}
<!-- Added FIles for dropdown-->
{{------================================= EXTRA ==============================================--}}


<script>
    $(document).ready(function() {
    $('#datatable').DataTable({
     responsive: true,
     language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        }
    });
});
</script>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>

<script>
$(".datepicker").datetimepicker(
{
    // format:"MM/DD/YYYY",
    format:"YYYY-MM-DD",
    icons:
    {
        time:"fa fa-clock-o",
        date:"fa fa-calendar",
        up:"fa fa-chevron-up",
        down:"fa fa-chevron-down",
        previous:"fa fa-chevron-left",
        next:"fa fa-chevron-right",
        today:"fa fa-screenshot",
        clear:"fa fa-trash",
        close:"fa fa-remove"
    }
}),

$(".timepicker").datetimepicker(
{
    // format:"h:mm A",
    format:"HH:mm:ss",
    icons:
    {
        time:"fa fa-clock-o",
        date:"fa fa-calendar",
        up:"fa fa-chevron-up",
        down:"fa fa-chevron-down",
        previous:"fa fa-chevron-left",
        next:"fa fa-chevron-right",
        today:"fa fa-screenshot",
        clear:"fa fa-trash",
        close:"fa fa-remove"
    }
})
</script>


<!-- -----------================ ONCLICK BET RATE MODAL ==================-------------- -->
<script type="text/javascript">
    $('#changeBetRate').on('show.bs.modal', function (event) {
    $("#errorChangeBet").hide();
    console.log("----------------");
    // ============ get all the data from index.... ================
    var button = $(event.relatedTarget)

    var bet_rate = button.data('ans_bet_rate');
    var ans_id = button.data('ans_id');

    // let ans_id = button.data('ans_id');
    console.log("----------------");
    console.log(bet_rate);
    console.log(ans_id);
    console.log("----------------");

    //========== Show All the datas in the Modal ===========
    var modal = $(this);
    //  Extra Values sent to Modal for identity
    modal.find('#change_bet_rate').val(bet_rate);
    modal.find('#bet_ans_id').val(ans_id);
});
</script>

<!-- -----------================ ONCLICK CHANGE QUESTION MODAL ==================-------------- -->
<script type="text/javascript">
    $('#ques_change_modal').on('show.bs.modal', function (event) {
    $("#errorChangeQues").hide();
    console.log("----------------");
    // ============ get all the data from index.... ================
    var button = $(event.relatedTarget)

    var quest_id = button.data('quest_id');
    var question = button.data('question');

    // let ans_id = button.data('ans_id');
    console.log("--------question--------");
    console.log(quest_id);
    console.log(question);
    console.log("----------------");

    //========== Show All the datas in the Modal ===========
    var modal = $(this);
    //  Extra Values sent to Modal for identity
    modal.find('#quest_id').val(quest_id);
    modal.find('#change_quest').val(question);
});
</script>


<!-- SCRIPTS FOR ACTIVE/INACTIVE ALL ANSWERS OF A QUESTION -->
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
<script type="text/javascript">
    $(document).ready(function(){
        let x;
        <?php

        $QUESTIONS = $questions ?? [];

        foreach($QUESTIONS as $q)
        { ?>
            $('#QUES_ID_<?= $q->id; ?>').click(function() {
                console.log("AJAX AJAX AJAX AJAX -----<?=$q->id; ?>------ AJAX AJAX AJAX AJAX")
                let ID = <?=$q->id; ?>;
                $.ajax({
                    type:'get',
                    data:{'id':ID},
                    url:"{{ route('admin.games.question.answers.status') }}",
                    success:function(data){
                        console.log("SUCCESS: ")
                        console.log(data[0])
                        if(data[1]==0)
                        {
                            $('.ques_id_<?= $q->id; ?>').text("inactive");
                            $(".backG_<?= $q->id; ?>").css("background-color", "#e9808f");

                        }
                        else if(data[1]==1){
                            $('.ques_id_<?= $q->id; ?>').text("active");
                            $(".backG_<?= $q->id; ?>").css("background-color", "#8fda99");
                        }
                    },
                    error:function(){
                        //
                    }
                });
            });
        <?php } ?>

    });
</script>



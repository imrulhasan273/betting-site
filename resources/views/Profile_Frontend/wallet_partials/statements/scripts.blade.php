<script type="text/javascript">

    $(document).ready(function() {
        $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
            e.preventDefault();
            $(this).siblings('a.active').removeClass("active");
            $(this).addClass("active");
            var index = $(this).index();
            $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
            $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
        });
    });

</script>

<script type="text/javascript">
    $('#sampleTable0').DataTable();
    $('#sampleTable1').DataTable();
    $('#sampleTable2').DataTable();
    $('#sampleTable3').DataTable();
    $('#sampleTable4').DataTable();
    $('#sampleTable5').DataTable();
    $('#sampleTable6').DataTable();
</script>

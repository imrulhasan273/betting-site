<script type="text/javascript">
    $("#placeBet").on("click", function() {
        console.log('HELLO');
        var game = $("#bettingTitle").html();
        console.log(game);

    });
</script>

{{-- <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
          var ga = document.createElement('script');
          ga.type = 'text/javascript';
          ga.async = true;
          ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
          var s = document.getElementsByTagName('script')[0];
          s.parentNode.insertBefore(ga, s);
        })();

        $('#tapbalance').click(function(event) {
          $('#tbalance2').hide();
          $('#tbalance').show();
          setTimeout(function() {

            $("#tbalance").hide();

            $("#tbalance2").show();
          }, 2000);
        });

        $('#show_deposit_notice').click(function(event) {
          $('#deposit_notice').fadeIn('slow/900/fast', function() {

          });

          setTimeout(function() {
            $("#deposit_notice").fadeOut('slow/400/fast', function() {

            });
          }, 10000);


        });
        $('#show_withdraw_notice').click(function(event) {
          $('#withdraw_notice').fadeIn('slow/900/fast', function() {

          });

          setTimeout(function() {


            $("#withdraw_notice").fadeOut('slow/400/fast', function() {

            });
          }, 10000);

        });
        //one ten game
        $('#stakeAmountoneten').keyup(function() {
          var stake = $('#stakeAmountoneten').val();
          $('#onetentotalstake').html(stake);
          var first = stake * 3;
          var second = stake * 2.5;
          var third = stake * 2;
          $('#possibleAmount1').html(first);
          $('#possibleAmount2').html(second);
          $('#possibleAmount3').html(third);
        });
        var games_id = "";
        var options_id = "";

        function option_select(game_id, option_id, option_no) {
          games_id = game_id;
          options_id = option_id;
          $('#select_option').html(option_no);
        }
        $(document).ready(function() {
          $('#oneten_placebet').click(function(event) {
            var stake = $('#stakeAmountoneten').val();
            if (stake == "") {
              alert('Give stake amount');
            } else {
              if (options_id == "") {
                alert('select an option')
              } else {
                $.ajax({
                  method: "POST",
                //   url: 'oneten_betplace',

                  data: {
                    game_id: games_id,
                    option_id: options_id,
                    stake: stake
                  },
                  success: function(data) {

                    if (data == "Bet Placed Successfuly") {

                      $('#errorBetoneten').show();
                      $('#errorBetoneten').removeClass('alert-success');
                      $('#errorBetoneten').removeClass('alert-danger');
                      $('#errorBetoneten').addClass('alert-success');
                      $('#alertBetoneten').html(data);

                      setTimeout(function() {
                        $("#errorBetoneten").hide();
                        $(".betForm").hide();
                        location.reload();
                      }, 1000);
                    } else {

                      $('#errorBetoneten').show();
                      $('#errorBetoneten').removeClass('alert-success');
                      $('#errorBetoneten').removeClass('alert-danger');
                      $('#errorBetoneten').addClass('alert-danger');
                      $('#alertBetoneten').html(data);
                      betclick = 0;
                      setTimeout(function() {

                        $("#errorBetoneten").hide();
                      }, 1000);

                    }

                  }
                });
              }
            }

          });

        });
        // oneten_refresh
        // setInterval(function() {
        //   $.ajax({
        //     method: "POST",
        //     url: 'oneten_refresh',
        //     data: {
        //       wAmount: '1'
        //     },
        //     success: function(data) {
        //       // console.log(data);

        //       if (data === "1") {
        //         location.reload();

        //       }
        //     }
        //   });
        // }, 8000);

        $('#200a').click(function(event) {
          $('#stakeAmountoneten').val('200');
          var stake = $('#stakeAmountoneten').val();
          $('#onetentotalstake').html(stake);
          var first = stake * 3;
          var second = stake * 2.5;
          var third = stake * 2;
          $('#possibleAmount1').html(first);
          $('#possibleAmount2').html(second);
          $('#possibleAmount3').html(third);

        });
        $('#500a').click(function(event) {
          $('#stakeAmountoneten').val('500');
          var stake = $('#stakeAmountoneten').val();
          $('#onetentotalstake').html(stake);
          var first = stake * 3;
          var second = stake * 2.5;
          var third = stake * 2;
          $('#possibleAmount1').html(first);
          $('#possibleAmount2').html(second);
          $('#possibleAmount3').html(third);

        });
        $('#1000a').click(function(event) {
          $('#stakeAmountoneten').val('1000');
          var stake = $('#stakeAmountoneten').val();
          $('#onetentotalstake').html(stake);
          var first = stake * 3;
          var second = stake * 2.5;
          var third = stake * 2;
          $('#possibleAmount1').html(first);
          $('#possibleAmount2').html(second);
          $('#possibleAmount3').html(third);

        });
        $('#3000a').click(function(event) {
          $('#stakeAmountoneten').val('3000');
          var stake = $('#stakeAmountoneten').val();
          $('#onetentotalstake').html(stake);
          var first = stake * 3;
          var second = stake * 2.5;
          var third = stake * 2;
          $('#possibleAmount1').html(first);
          $('#possibleAmount2').html(second);
          $('#possibleAmount3').html(third);

        });
        $('#5000a').click(function(event) {
          $('#stakeAmountoneten').val('5000');
          var stake = $('#stakeAmountoneten').val();
          $('#onetentotalstake').html(stake);
          var first = stake * 3;
          var second = stake * 2.5;
          var third = stake * 2;
          $('#possibleAmount1').html(first);
          $('#possibleAmount2').html(second);
          $('#possibleAmount3').html(third);

        });

        $('#add_multibet').click(function(event) {
          $.ajax({
            method: "POST",
            url: 'betfacedata_2',
            //dataType: 'JSON',
            data: {
              bettingTitle: bettingTitle,
              bettingSubTitle: bettingSubTitle,
              BettingSubTitleOption: BettingSubTitleOption
            },
            success: function(data) {

              $.ajax({
                method: "GET",
                // url: 'get_bet_slip',
                data: {
                  uid: 'ss'
                },
                success: function(datas) {

                  if (data == '1') {
                    $("#bet_slip").load('bet_slip');
                    $('#bet_slip_div').css('display', 'block');

                    show = 0;

                  } else {
                    alert(data);
                    $("#bet_slip").load('bet_slip');
                  }
                }
              });
            }
          });

          count_multi();

        });

        function delete_bet_slip(id) {
          $.ajax({
            method: "POST",
            // url: 'delete_bet_slip',
            data: {
              id: id
            },
            success: function(data) {
              if (data == '1') {

                $("#bet_slip").load('bet_slip');
                count_multi();
              }
            }
          });

        }



        // ============================BET SECTION ===========================
        function seect_option(a, b, c)
        {
          if (multi == 0)
          {
            $('#betting').modal('show');
          }
          else
          {
            $.ajax({
              method: "POST",
              url: 'betfacedata_2',
              //dataType: 'JSON',
              data: {
                bettingTitle: a,
                bettingSubTitle: b,
                BettingSubTitleOption: c
              },
              success: function(data) {

                $.ajax({
                  method: "GET",
                //   url: 'get_bet_slip',
                  data: {
                    uid: 'ss'
                  },
                  success: function(datas) {

                    if (data == '1')
                    {
                      $("#bet_slip").load('bet_slip');
                      $('#bet_slip_div').css('display', 'block');
                      show = 0;
                      count_multi();

                    }
                    else
                    {
                      alert(data);
                      $("#bet_slip").load('bet_slip');
                    }
                  }
                });
              }
            });

          }
        }

        function count_multi() {
          $.ajax({
            method: "GET",
            // url: 'count_bet_slip',
            data: {
              id: "id"
            },
            success: function(data) {
              $('#betslip_toolkit').show();
              $('#total_multi').html(data);

            }
          });
        }
</script> --}}
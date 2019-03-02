$(document).ready(function () {

  /*
  * Ajex Resquest to get all the monthly and weekly reports
  * Weekly Report
  */
  if ($('#get_week_report').length) {

    var get_weekly_report = function () {

      var action = 'get_weekly';

      $.ajax({
        url: "",

        method:"POST",

        data:{action:action},

        success:function(data) {

          $('#get_week_report').html(data);

        }
      });
    }

    setInterval(function() {
      get_weekly_report()
    }, 3000);

  }

  /*
  * Ajex Resquest to get all the monthly and weekly reports
  * Monthly Report
  */
  if ($('#get_month_report').length) {

    var get_weekly_report = function () {

      var action = 'get_monthly';

      $.ajax({
        url: "",

        method: "POST",

        data:{action:action},

        success:function(data) {

          $('#get_month_reprt').html(data);
        }
      });
    }

    setInterval(function(){
      get_monthly_report()
    }, 3000);
  }


});

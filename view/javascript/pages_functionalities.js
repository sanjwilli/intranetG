$(document).ready(function() {

  //Profile functions
  $('.personal_edit').click(function() {
    /* Act on the event */


    var edit = $('div').find('.p_edit');

    if(edit.hasClass('disabled')) {


      edit.removeClass('disabled');

    } else {

      edit.addClass('disabled');
    }

  });

  //Emergency functions
  $('.emergency_edit').click(function() {
    /* Act on the event */


    var edit = $('div').find('.e_edit');

    if(edit.hasClass('disabled')) {


      edit.removeClass('disabled');

    } else {

      edit.addClass('disabled');
    }

  });

  //address functions
  $('.address_edit').click(function() {
    /* Act on the event */


    var edit = $('div').find('.a_edit');

    if(edit.hasClass('disabled')) {


      edit.removeClass('disabled');

    } else {

      edit.addClass('disabled');
    }

  });
});

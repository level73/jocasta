$(document).ready( function(){

var Jocasta = {
  init: function(){
    $('.datetimepicker').datetimepicker({
      format: 'DD/MM/YYYY',
      locale: 'it',
      icons: {
        time:     'fal fa-time',
        date:     'fal fa-calendar',
        up:       'fal fa-chevron-up',
        down:     'fal fa-chevron-down',
        previous: 'fal fa-chevron-left',
        next:     'fal fa-chevron-right',
        today:    'fal fa-screenshot',
        clear:    'fal fa-trash',
        close:    'fal fa-remove'
      }
    });
    $('input[type="checkbox"].switch').bootstrapSwitch({
      'onText': 'SI',
      'offText': 'NO',
      'onColor': 'jocasta'
    });
  },
}

Jocasta.init();

});

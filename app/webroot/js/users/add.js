(function() {
  jQuery(function() {
    return $('#datetimepicker10').datetimepicker({
      language: 'es',
      pickTime: false,
      icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-arrow-up",
        down: "fa fa-arrow-down"
      }
    });
  });

}).call(this);

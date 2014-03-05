(function() {
  jQuery(function() {
    $("[id^='datepicker']").datetimepicker({
      language: 'es',
      pickTime: false,
      icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-arrow-up",
        down: "fa fa-arrow-down"
      }
    });
    return $("[id^='datetimepicker']").datetimepicker({
      language: 'es',
      pickTime: true,
      icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-arrow-up",
        down: "fa fa-arrow-down"
      }
    });
  });

}).call(this);

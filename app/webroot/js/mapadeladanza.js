(function() {
  jQuery(function() {
    return $('#moreTimeTables').on('click', function() {
      return $('#timeTables').append('<input type="file" class="btn btn-default" name="data[Timetable][]">');
    });
  });

}).call(this);

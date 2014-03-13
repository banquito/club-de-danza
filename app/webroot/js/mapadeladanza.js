(function() {
  jQuery(function() {
    return $('#moreTimeTables').on('click', function() {
      return $('#timeTables').append('<input type="file" class="form-control" name="data[Timetable][]">');
    });
  });

}).call(this);

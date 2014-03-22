(function() {
  jQuery(function() {
    var videoN;
    videoN = 1;
    $('#moreTimeTables').on('click', function() {
      return $('#timeTables').append('<input type="file" class="btn btn-default" name="data[Timetable][]">');
    });
    $('#moreAttachments').on('click', function() {
      return $('#attachments').append('<input type="file" class="btn btn-default" name="data[Attachment][]">');
    });
    $('#morePhotos').on('click', function() {
      return $('#photos').append('<input type="file" class="btn btn-default" name="data[Photo][]">');
    });
    return $('#moreVideos').on('click', function() {
      if ((typeof videoAux !== "undefined" && videoAux !== null) && videoAux > 0) {
        videoAux++;
        $('#videos').append('<input type="text" class="col-sm-6" name="data[Video][' + videoAux + '][name]" placeholder="Nombre">');
        return $('#videos').append('<input type="text" class="col-sm-6" name="data[Video][' + videoAux + '][file]" placeholder="Video">');
      } else {
        $('#videos').append('<input type="text" class="col-sm-6" name="data[Video][' + videoN + '][name]" placeholder="Nombre">');
        $('#videos').append('<input type="text" class="col-sm-6" name="data[Video][' + videoN + '][file]" placeholder="Video">');
        return videoN++;
      }
    });
  });

}).call(this);

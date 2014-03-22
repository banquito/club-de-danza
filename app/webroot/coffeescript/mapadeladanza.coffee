jQuery ->
	videoN = 1

	$('#moreTimeTables').on 'click', ->
		$('#timeTables').append('<input type="file" class="btn btn-default" name="data[Timetable][]">')

	$('#moreAttachments').on 'click', ->
		$('#attachments').append('<input type="file" class="btn btn-default" name="data[Attachment][]">')

	$('#morePhotos').on 'click', ->
		$('#photos').append('<input type="file" class="btn btn-default" name="data[Photo][]">')

	$('#moreVideos').on 'click', ->
		if videoAux? and videoAux > 0
			videoAux++
			$('#videos').append('<input type="text" class="col-sm-6" name="data[Video][' + videoAux + '][name]" placeholder="Nombre">')
			$('#videos').append('<input type="text" class="col-sm-6" name="data[Video][' + videoAux + '][file]" placeholder="Video">')
		else
			$('#videos').append('<input type="text" class="col-sm-6" name="data[Video][' + videoN + '][name]" placeholder="Nombre">')
			$('#videos').append('<input type="text" class="col-sm-6" name="data[Video][' + videoN + '][file]" placeholder="Video">')
			videoN++

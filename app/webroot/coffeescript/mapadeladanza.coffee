jQuery ->
	$('#moreTimeTables').on 'click', ->
		$('#timeTables').append('<input type="file" class="form-control" name="data[Timetable][]">')
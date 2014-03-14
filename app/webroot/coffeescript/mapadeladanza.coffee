jQuery ->
	$('#moreTimeTables').on 'click', ->
		$('#timeTables').append('<input type="file" class="btn btn-default" name="data[Timetable][]">')
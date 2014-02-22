jQuery ->
	# area1 = new nicEditor({
	# 	fullPanel: true,
	# 	iconsPath: '/img/vendors/nicEditorIcons.gif'
	# }).panelInstance('NoteBody', {hasPanel: true})

	# List of Buttons for buttonList option

 #    'bold'
 #    'italic'
 #    'underline'
 #    'left'
 #    'center'
 #    'right'
 #    'justify'
 #    'ol'
 #    'ul'
 #    'subscript'
 #    'superscript'
 #    'strikethrough'
 #    'removeformat'
 #    'indent'
 #    'outdent'
 #    'hr'
 #    'image'
 #    'upload' * requires nicUpload
 #    'forecolor'
 #    'bgcolor'
 #    'link' * requires nicLink
 #    'unlink' * requires nicLink
 #    'fontSize' * requires nicSelect
 #    'fontFamily' * requires nicSelect
 #    'fontFormat' * requires nicSelect
 #    'xhtml' * required nicCode


	editors = nicEditors.allTextAreas({iconsPath: '/img/vendors/nicEditorIcons.gif'
		, buttonList: ['bold', 'italic', 'underline', 'left', 'center', 'right', 'justify', 'ol', 'ul', 'indent', 'outdent', 'forecolor', 'bgcolor', 'link', 'unlink', 'removeformat']
	});
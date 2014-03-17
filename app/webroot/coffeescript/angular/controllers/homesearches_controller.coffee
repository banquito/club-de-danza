angular.module("App").controller 'HomesearchesController'
	, ['$scope', '$http', '$timeout'
		, ($scope, $http, $timeout) ->

	$scope.cajas = [
		{name: 'caja1', title: "Caja 1"}
		{name: 'caja2', title: "Caja 2"}
		{name: 'caja3', title: "Caja 3"}
		{name: 'caja4', title: "Caja 4"}
		{name: 'caja5', title: "Caja 5"}
		{name: 'caja6', title: "Caja 6"}
		{name: 'caja7', title: "Caja 7"}
		{name: 'caja8', title: "Caja 8"}
	]

	$scope.sections = [
		{name: 'auditions_calls'
			, title: "Audiciones y Convocatorias"
			, subsections: [
				{name: 'auditions', title: 'Audición', url: '/auditions/view/', image: 'auditions/'}
				{name: 'calls', title: 'Convocatoria', url: '/calls/view/', image: 'calls/'}
				{name: 'castings', title: 'Castings', url: '/castings/view/', image: 'castings/'}
				{name: 'jobs', title: 'Búsqueda Laboral', url: '/jobs/view/', image: 'jobs/'}
			]
		}
		{name: 'notes', title: 'Notas', url: '/notes/view/', image: 'notes/'}
		{name: 'mapadeladanza'
			, title: "Mapa de la Danza"
			, subsections: [
				{name: 'accessories', title: 'Accesorio', url: '/accessories/view/', image: 'accessories/'}
				{name: 'estudies', title: 'Estudios', url: '/estudies/view/', image: 'estudies/'}
				{name: 'practicerooms', title: 'Sala de Ensayo', url: '/practicerooms/view/', image: 'practicerooms/'}
			]
		}
	]


	$scope.setupElements = (data) ->
		$scope.section.elements = []
		angular.forEach data, (elem) ->
			angular.forEach elem, (subelem) ->
				if subelem.title? then subelem.name = subelem.title
				$scope.section.elements.push(subelem)

	$scope.$watch 'section', ->
		if $scope.section?
			$scope.section.elements = []
			$http.get('/home/getElements', {params: {section: $scope.section, subsection: $scope.section.subsection}})
				.success (data) ->
					$scope.setupElements(data)
	
	$scope.$watch 'section.subsection', ->
		if $scope.section? and $scope.section.subsection?
			$scope.section.elements = []
			$http.get('/home/getElements', {params: {section: $scope.section, subsection: $scope.section.subsection}})
				.success (data) ->
					$scope.setupElements(data)

	
	$scope.submit = (event) ->
		event.preventDefault()
		event.stopPropagation()

		if $scope.registerForm.$valid isnt true
			event.preventDefault()
			$scope.errorMessage = 'Verifique los datos'

		if not $scope.caja?
			event.preventDefault()
			$scope.errorMessage = 'Seleccione una Caja'

		if not $scope.element?
			event.preventDefault()
			$scope.errorMessage = 'Seleccione un elemento'
		else
			if $scope.section?
				homesearch = {}

				# URL
				if $scope.section.subsection?
					homesearch.url = $scope.section.subsection.url + $scope.element.id
					homesearch.image = $scope.section.subsection.image + $scope.element.image
				else
					homesearch.url = $scope.section.url + $scope.element.id
					homesearch.image = $scope.section.image + $scope.element.image

				homesearch.caja = $scope.caja.name
				homesearch.title = $scope.element.name

				$http.post('/home/admin', {homesearch})
					.success ->
						$scope.caja = null
						$scope.section = null
						$scope.element = null
						$scope.errorMessage = null
				
				console.log homesearch
			else
				event.preventDefault()
				$scope.errorMessage = 'Verifique los datos'
			




]
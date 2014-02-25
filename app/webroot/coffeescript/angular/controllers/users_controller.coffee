angular.module("App").controller 'UsersController'
	, ['$scope', '$http', '$timeout'
		, ($scope, $http, $timeout) ->

	# $scope.EMAIL_REGEXP = new RegExp("/^[a-z0-9]+@[a-z0-9-]+(\.[a-z0-9-]+)*$/i")
	$scope.EMAIL_REGEXP = /^[a-z0-9]+@[a-z0-9]+(\.[a-z]{2,4})+$/

	$scope.birthdayKeydown = (event) ->
		event.preventDefault()
		$scope.errorMessage = 'Selecciona tu cumpleaños con el calendario'

	$scope.submit = (event) ->
		if $scope.User.password isnt $scope.User.password2
			event.preventDefault()
			$scope.errorMessage = 'Las contraseñas deben ser iguales'
			return
		
		if $scope.registerForm.$valid isnt true
			event.preventDefault()
			$scope.errorMessage = 'Verifique los datos'

]
(function() {
  angular.module("App").controller('UsersController', [
    '$scope', '$http', '$timeout', function($scope, $http, $timeout) {
      $scope.EMAIL_REGEXP = /^[a-z0-9]+@[a-z0-9]+(\.[a-z]{2,4})+$/;
      $scope.birthdayKeydown = function(event) {
        event.preventDefault();
        return $scope.errorMessage = 'Selecciona tu cumpleaños con el calendario';
      };
      return $scope.submit = function(event) {
        if ($scope.User.password !== $scope.User.password2) {
          event.preventDefault();
          $scope.errorMessage = 'Las contraseñas deben ser iguales';
          return;
        }
        if ($scope.registerForm.$valid !== true) {
          event.preventDefault();
          return $scope.errorMessage = 'Verifique los datos';
        }
      };
    }
  ]);

}).call(this);

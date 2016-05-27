var app = angular.module('app',[]),
    defaultView = 'pinnwand';

app.controller('ViewController', ['$scope', function($scope) {
  updateHash($scope);
  window.onhashchange = function() {
    $scope.$apply(function() {
      updateHash($scope)
    });
  };
}]);

function updateHash($scope) {
  var hash = location.hash.substr(1) || defaultView,
      parts = hash.split('/');
  $scope.hash = parts[0];
  $scope.sub = parts.length > 1 ? parts[1] : '';
  $scope.showMenu = false;
  $scope.showUserMenu = false;
}

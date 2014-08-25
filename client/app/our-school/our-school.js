'use strict';

angular.module('pianoforteApp')
  .config(function ($routeProvider) {
    $routeProvider
      .when('/our-school', {
        templateUrl: 'app/our-school/our-school.html',
        controller: 'OurSchoolCtrl'
      });
  });

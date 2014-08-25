'use strict';

angular.module('pianoforteApp')
  .config(function ($routeProvider) {
    $routeProvider
      .when('/english-page', {
        templateUrl: 'app/english-page/english-page.html',
        controller: 'EnglishPageCtrl'
      });
  });

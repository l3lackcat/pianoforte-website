'use strict';

angular.module('pianoforteApp')
  .config(function ($routeProvider) {
    $routeProvider
      .when('/english-page', {
        templateUrl: 'app/views/english-page/english-page.html',
        controller: 'EnglishPageCtrl'
      });
  });

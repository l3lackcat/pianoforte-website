'use strict';

angular.module('pianoforteApp')
  .config(function ($routeProvider) {
    $routeProvider
      .when('/contact-us', {
        templateUrl: 'app/contact-us/contact-us.html',
        controller: 'ContactUsCtrl'
      });
  });

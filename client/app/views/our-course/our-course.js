'use strict';

angular.module('pianoforteApp')
  .config(function ($routeProvider) {
    $routeProvider
      .when('/our-course', {
        templateUrl: 'app/views/our-course/our-course.html',
        controller: 'OurCourseCtrl'
      });
  });

'use strict';

angular.module('pianoforteApp')
  .controller('HeaderCtrl', function ($scope, $location) {
    $scope.menu = [{
      'title': 'Home',
      'link': '/'
    }, {
      'title': 'Our School',
      'link': '/our-school'
    }, {
      'title': 'Our Course',
      'link': '/our-course'
    }, {
      'title': 'Contact Us',
      'link': '/contact-us'
    }, {
      'title': 'English Page',
      'link': '/english-page'
    }];

    $scope.isActive = function(route) {
      return route === $location.path();
    };
  });
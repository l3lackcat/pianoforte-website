'use strict';

describe('Controller: OurCourseCtrl', function () {

  // load the controller's module
  beforeEach(module('pianoforteApp'));

  var OurCourseCtrl, scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    OurCourseCtrl = $controller('OurCourseCtrl', {
      $scope: scope
    });
  }));

  it('should ...', function () {
    expect(1).toEqual(1);
  });
});

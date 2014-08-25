'use strict';

describe('Controller: OurSchoolCtrl', function () {

  // load the controller's module
  beforeEach(module('pianoforteApp'));

  var OurSchoolCtrl, scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    OurSchoolCtrl = $controller('OurSchoolCtrl', {
      $scope: scope
    });
  }));

  it('should ...', function () {
    expect(1).toEqual(1);
  });
});

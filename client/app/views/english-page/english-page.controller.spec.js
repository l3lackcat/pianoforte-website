'use strict';

describe('Controller: EnglishPageCtrl', function () {

  // load the controller's module
  beforeEach(module('pianoforteApp'));

  var EnglishPageCtrl, scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    EnglishPageCtrl = $controller('EnglishPageCtrl', {
      $scope: scope
    });
  }));

  it('should ...', function () {
    expect(1).toEqual(1);
  });
});

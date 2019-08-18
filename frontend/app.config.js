'use strict';

angular.module('myApp').config(['$routeProvider','$locationProvider',
    function config($routeProvider,$locationProvider) {
      
        $routeProvider.
        when('/', {
          template: '<userlistview></userlistview>',
        }).
        when('/create-user', {
          template: '<createuserview></createuserview>',
        }).
        when('/edit-user/:userId', {
          template: '<usereditview></usereditview>',
        }).
        when('/user/:userId', {
          template: '<getuserview></getuserview>',
        })
     
    } 
  ]);



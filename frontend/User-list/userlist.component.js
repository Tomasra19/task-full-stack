'use strict'

var user_list = angular.module('userlist', []);

user_list.
    component('userlistview',
    {
        templateUrl: "/User-list/userlist.template.html",
        controller: UserListController
    });


    UserListController.$inject = ['$http','$location'];

function UserListController($http, $location) {
    var vm = this;


    var getUserList = function() {
        var req = {
            method: 'GET',
            url: 'http://localhost:8000/getusers',
        }
  
           $http(req).then(
              function successCallback(response) {
                 vm.data = response.data;
                },
                function errorCallback(response) {
                  
                  console.log(response);
              })
       
    };

    vm.deleteUser = function(user_id) {
        var req = {
          method: 'DELETE',
          url: 'http://localhost:8000/deleteuser/'+ user_id,
         
          }
          $http(req).then(
          function successCallback(response) {
            vm.data = response.data
            getUserList()
            console.log(vm.data)
            
          },
          function errorCallback(response) {
            console.log(response)
          })

    };

    
    vm.edit = function (id) {
      $location.url('/edit-user/'+ id );
    }

    vm.getUser = function (id) {
        $location.url('/user/'+ id );
      }

    getUserList();
    
}
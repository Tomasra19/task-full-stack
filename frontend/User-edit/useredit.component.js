'use strict'

var user_edit = angular.module('useredit', []);

user_edit.
    component('usereditview',
    {
        templateUrl: "/User-edit/useredit.template.html",
        controller: UserEditController
    });


    UserEditController.$inject = ['$http','$location','$window'];
   

function UserEditController($http, $location) {
    var vm = this;
    getUserToEdit(vm,$http,$location);
    vm.submit = function() {submitEditedUser(vm,$http,$location);}

    function getUserToEdit(vm,$http,$location) {
        var absUrl = $location.absUrl();
        var test_id = (absUrl.split('/')[5]);
    
        var request = {
          method: 'GET',
          url: 'http://localhost:8000/getuser/'+test_id,
        }
    
        $http(request).then(
                function successCallback(response) {
                    var data=response.data;
                   console.log(data);
                   vm.name = data.name;
                   vm.username = data.username;
                   vm.email = data.email;
                   vm.street= data.street;
                    vm.suite= data.suite;
                    vm.city= data.city;
                    vm.zipcode= data.zipcode;
                    vm.lat= data.lat;
                    vm.lng= data.lng;
                    vm.phone= data.phone;
                    vm.website= data.website;
                    vm.companyName= data.company_name;
                    vm.catchPhrase= data.catchPhrase;
                    vm.bs= data.company_bs;
                  },
                  function errorCallback(response) {
                    console.log(response);
                })
               
              
    }
    function submitEditedUser(vm, $http, $location) {  
  
        var absUrl = $location.absUrl();
        var user_id = (absUrl.split('/')[5]);
        var User = 
        { 
          name: vm.name,
          username: vm.username,
          email: vm.email,
          address: {
            street: vm.street,
            suite: vm.suite,
            city: vm.city,
            zipcode: vm.zipcode,
            geo:{
                lat: vm.lat,
                lng: vm.lng,
            }
          },
          phone: vm.phone,
          website: vm.website,
          company:{
            name: vm.companyName,
            catchPhrase: vm.catchPhrase,
            bs: vm.bs,
          }
        };
      
        var req = {
          method: 'PUT',
          url: 'http://localhost:8000/updateuser/'  +user_id,
          data: User,
          
         }
         
         $http(req).then(
          function successCallback(response) {
            vm.data=response.data;
            alert("User was updated!");
            $location.url('/'); 
          },
          function errorCallback(response) {
            alert("User cant be updated");
            console.log(response);
          })
      }
}
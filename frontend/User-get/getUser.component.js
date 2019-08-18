'use strict'

var get_user = angular.module('getUser', []);

get_user.
    component('getuserview',
    {
        templateUrl: "/User-get/getUser.template.html",
        controller: getUserController
    });


    getUserController.$inject = ['$http','$location'];

function getUserController($http, $location) {
    var vm = this;
    
    getUser(vm,$http,$location);

function getUser(vm,$http,$location) {
        var absUrl = $location.absUrl();
        var user_id = (absUrl.split('/')[5]);
    
        var request = {
          method: 'GET',
          url: 'http://localhost:8000/getuser/'+user_id,
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
              
       
    };

   

    
}
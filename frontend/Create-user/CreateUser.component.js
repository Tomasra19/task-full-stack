'use strict'

var create_user = angular.module('createuser', []);

create_user.
    component('createuserview',
    {
        templateUrl: "/Create-user/CreateUser.template.html",
        controller: CreateUserController
    });


    CreateUserController.$inject = ['$http','$location'];

function CreateUserController($http, $location) {
    var vm = this;
    vm.submit = function() {submitTest(vm,$http,$location);}
    vm.generate = function() {GenerateUser();}

    function submitTest(vm, $http, $location) {
       
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
          method: 'POST',
          url: 'http://localhost:8000/createuser',
         data: User 
              
         
         }
     
         $http(req).then(
          function successCallback(response) {
            vm.data=response.data;
            alert("User was created!");
            $location.url('/'); 
          },
          function errorCallback(response) {
            console.log(response.data);
            alert(response.data);
          })
    
         
    }

var RandomNumber=function(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}
    var GenerateUser = function() {
        var req = {
            method: 'GET',
            url: '  https://jsonplaceholder.typicode.com/users',
        }
  
           $http(req).then(
              function successCallback(response) {
                // vm.data = response.data;
                 var number = RandomNumber(0,9);
                 console.log(number);
               var data=response.data;
                console.log(data[number].name);
                var User = 
                { 
                  name: data[number].name,
                  username: data[number].username,
                  email: data[number].email,
                  address: {
                    street: data[number].address.street,
                    suite: data[number].address.suite,
                    city: data[number].address.city,
                    zipcode: data[number].address.zipcode,
                    geo:{
                        lat: data[number].address.geo.lat,
                        lng: data[number].address.geo.lng,
                    }
                  },
                  phone: data[number].phone,
                  website: data[number].website,
                  company:{
                    name: data[number].company.name,
                    catchPhrase: data[number].company.catchPhrase,
                    bs: data[number].company.bs,
                  }
                };
               
                var req = {
                  method: 'POST',
                  url: 'http://localhost:8000/createuser',
                 data: User 
                      
                 
                 }
             
                 $http(req).then(
                  function successCallback(response) {
                    vm.data=response.data;
                    alert("User was created!");
                    $location.url('/'); 
                  },
                  function errorCallback(response) {
                    console.log(response.data);
                    alert(response.data);
                  })
            },
               
                function errorCallback(response) {
                  var status = response.status;
                  if(status === 401)
                  console.log(status);
              })
       
    };
    
  

    
}
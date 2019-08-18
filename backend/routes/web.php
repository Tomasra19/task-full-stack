<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/getusers', ['uses' => 'UsersController@getUsers']);
$router->get('/getuser/{user_id}', ['uses' => 'UsersController@getUser']);
$router->post('/createuser', ['uses' => 'UsersController@CreateUser']);
$router->put('/updateuser/{user_id}','UsersController@updateUser');
$router->delete('/deleteuser/{user_id}','UsersController@deleteUser');

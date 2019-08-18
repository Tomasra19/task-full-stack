<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\User;

class UsersController extends Controller
{
    public function ValidateUser($request)
    {
      $data = $request->all();
      $validator = Validator::make($data, [
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email',
        ]);

        if (!$validator->passes()) {
            return $validator->errors()->all();
        }
        else
        {
              $address=$data['address'];
            $validator = Validator::make($address, [
                  'street' => 'required|string',
                  'suite' => 'required|string',
                  'city' => 'required|string',
              ]);
              if (!$validator->passes()) {
                  return $validator->errors()->all();
              }
              else
              {
                  $geo=$address['geo'];
                  $validator = Validator::make($geo, [
                        'lat' => 'required|numeric',
                        'lng' => 'required|numeric',
                        
                    ]);
                    if (!$validator->passes()) {
                        return $validator->errors()->all();
                    }
                    else
                    {
                      
                        $validator = Validator::make($data, [
                              'phone' => 'required|numeric',
                              'website' => 'required|string',
                              
                          ]);
                          if (!$validator->passes()) {
                              return $validator->errors()->all();
                          }
                          else
                          {
                              $company=$data['company'];
                              $validator = Validator::make($company, [
                                    'name' => 'required|string',
                                    'catchPhrase' => 'required|string',
                                    'bs' => 'required|string',
                                    
                                ]);
                                if (!$validator->passes()) {
                                    return $validator->errors()->all();
                                }
                                else
                                {
                                      return 'validated';
                                }
                          }
                    }
              }
        }
    }

    public function CreateUser(Request $request){
         $validation= $this->ValidateUser($request);
      
         if($validation == 'validated')
         {
            $user = new User;
            $user->name = $request['name'];
            $user->username = $request['username'];
            $user->email = $request['email'];
            $user->street = $request->address['street'];
            $user->suite = $request->address['suite'];
            $user->city = $request->address['city'];
            $user->zipcode = $request->address['zipcode'];
            $user->lat = $request->address['geo']['lat'];
            $user->lng = $request->address['geo']['lng'];
            $user->phone = $request['phone'];
            $user->website = $request['website'];
            $user->company_name = $request->company['name'];
            $user->catchPhrase = $request->company['catchPhrase'];
            $user->company_bs = $request->company['bs'];
            $user->save();
           return response('Created', 200);
         }
         else
         {
            return response($validation, 404);
         } 
    }
    public function deleteUser($user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return response("The user with {$user_id} doesn't exist", 404);
        }
        $user->delete();
        return response("The user with with id {$user_id} has been deleted ", 200);
    }

    public function getUsers()
    {
      
        $user = new User;
        return response()->json($user->all(), 200);
    }

    public function getUser($user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return response("The user with {$user_id} doesn't exist", 404);
        }
        return response()->json($user, 200);
    }

    public function updateUser(Request $request, $user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return response("The user with {$user_id} doesn't exist", 404);
        }
        $this->ValidateUser($request);
        $user->name = $request['name'];
            $user->username = $request['username'];
            $user->email = $request['email'];
            $user->street = $request->address['street'];
            $user->suite = $request->address['suite'];
            $user->city = $request->address['city'];
            $user->zipcode = $request->address['zipcode'];
            $user->lat = $request->address['geo']['lat'];
            $user->lng = $request->address['geo']['lng'];
            $user->phone = $request['phone'];
            $user->website = $request['website'];
            $user->company_name = $request->company['name'];
            $user->catchPhrase = $request->company['catchPhrase'];
            $user->company_bs = $request->company['bs'];
            $user->save();
        return response("The user with with id {$user_id} has been updated", 200);
    }
}
<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(3);

        return UserResource::collection($users);
    }


    public function store(Request $request)
    {
        $user = new User();
        if ($request->has('address')) {
            $user->name = $request->input('name');
            $user->username = $request->input('username');
            $user->email = $request->input('email');
            $user->street = $request->input('address.street');
            $user->suite = $request->input('address.suite');
            $user->city = $request->input('address.city');
            $user->zipcode = $request->input('address.zipcode');
            $user->lat = $request->input('address.geo.lat');
            $user->lng = $request->input('address.geo.lng');
            $user->phone = $request->input('phone');
            $user->website = $request->input('website');
            $user->cName = $request->input('company.name');
            $user->catchPhrase = $request->input('company.catchPhrase');
            $user->bs = $request->input('company.bs');
        } else {
            $user->name = $request->input('name');
            $user->username = $request->input('username');
            $user->email = $request->input('email');
            $user->street = $request->input('street');
            $user->suite = $request->input('suite');
            $user->city = $request->input('city');
            $user->zipcode = $request->input('zipcode');
            $user->lat = $request->input('lat');
            $user->lng = $request->input('lng');
            $user->phone = $request->input('phone');
            $user->website = $request->input('website');
            $user->cName = $request->input('cName');
            $user->catchPhrase = $request->input('catchPhrase');
            $user->bs = $request->input('bs');
        }

        $user->save();

        return new UserResource($user);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return new UserResource($user);
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return new UserResource($user);
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->delete()) {
            return new UserResource($user);
        }
    }
}

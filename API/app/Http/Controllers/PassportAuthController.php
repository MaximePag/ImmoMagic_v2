<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class PassportAuthController extends Controller
{

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'lastname' => 'required|min:3',
            'firstname' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'phoneNumber' => 'required|min:10',
            'address' => 'required',
            'postCode' => 'required|min:5|max:10',
            'city' => 'required',

        ]);

        $user = User::create([
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phoneNumber' => $request->phoneNumber,
            'address' => $request->address,
            'postCode' => $request->postCode,
            'city' => $request->city,
            'role_id' => $request->role_id = 1,
            'archived' => $request->archived = false,

        ]);

        $token = $user->createToken('LaravelAuthApp')->accessToken;

        return response()->json(['token' => $token], 200);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;

            return response()->json(['token' => $token], 200);
        }else{
            return response()->json(['error' => 'unauthorized'], 401);
        }
    }
}

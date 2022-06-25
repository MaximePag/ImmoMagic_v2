<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;


class PassportAuthController extends Controller
{

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function register(Request $request): JsonResponse
    {
        $this->validate($request, [
            'lastname' => 'required|min:3',
            'firstname' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'phoneNumber' => 'required|min:10',
            'address' => 'required',
            'postalCode' => 'required|min:5|max:10',
            'city' => 'required',
            'g5e1D_roles_id' => 'required',

        ]);

        $user = User::create([
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phoneNumber' => $request->phoneNumber,
            'address' => $request->address,
            'postalCode' => $request->postalCode,
            'city' => $request->city,
            'archived' => $request->archived = false,
            'g5e1D_roles_id' => $request->g5e1D_roles_id,

        ]);

        $token = $user->createToken('LaravelAuthApp')->accessToken;

        return response()->json(['message' =>'user register successfully!',
                                'token' => $token
        ], 200);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
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

    /**
     * @return JsonResponse
     */
    public function userInfo()
    {
        $user = auth()->user();

        return response()->json([
            'message' => 'User saved successfully!',
            'user' => $user
        ], 200);

    }
}

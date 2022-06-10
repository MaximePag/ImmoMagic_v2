<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index()
    {
        $users = User::all();

        return \response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        //validation of data
        $this->validate($request, [
            'lastname' => 'required|min:3',
            'firstname' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'phoneNumber' => 'required|min:10',
            'address' => 'required',
            'postCode' => 'required|min:5|max:10',
            'city' => 'required',
            'g5e1D_roles_id' => 'required',

        ]);

        //creation of new user
        $user = User::create([
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'email' => $request->email,
            'password' =>$request->password,
            'phoneNumber' =>$request->phoneNumber,
            'address' => $request->address,
            'postalCode' => $request->postalCode,
            'city' => $request->city,
            'g5e1D_roles_id' => $request->g5e1D_roles_id,
        ]);

        return \response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function show(User $user)
    {
        return \response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id)
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
            'g5e1D_roles_id' => 'required',

        ]);

        //creation of new user
        $user = User::where('id', $id)->update([
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'email' => $request->email,
            'password' =>$request->password,
            'phoneNumber' =>$request->phoneNumber,
            'address' => $request->address,
            'postalCode' => $request->postalCode,
            'city' => $request->city,
            'g5e1D_roles_id' => $request->g5e1D_roles_id,
        ]);

        return response()->json($user, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        return \response()->json();
    }

    /**
     * @param User $user
     * @return JsonResponse
     */
    public function archive(User $user)
    {
        $user = User::find($user);

        $user->archive = true;

        $user->save();

        return response()->json('User achived successfully.');
    }
}

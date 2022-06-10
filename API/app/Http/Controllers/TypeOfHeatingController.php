<?php

namespace App\Http\Controllers;

use App\Models\TypeOfHeating;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TypeOfHeatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $typeOfHeating = TypeOfHeating::all();

        return response()->json($typeOfHeating);
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
        $this->validate($request, [
            'name' => 'required'
        ]);

        $typeOfHeating = TypeOfHeating::create([
            'name' => $request->name
        ]);

        return response()->json($typeOfHeating, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param TypeOfHeating $typeOfHeating
     * @return JsonResponse
     */
    public function show(TypeOfHeating $typeOfHeating)
    {
        return response()->json($typeOfHeating);
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
            'name' => 'required'
        ]);

        $typeOfHeating = TypeOfHeating::where('id', $id)->update([
            'name' => $request->name
        ]);

        return response()->json($typeOfHeating);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TypeOfHeating $typeOfHeating
     * @return JsonResponse
     */
    public function destroy(TypeOfHeating $typeOfHeating)
    {
        $typeOfHeating->delete();

        return response()->json();
    }
}

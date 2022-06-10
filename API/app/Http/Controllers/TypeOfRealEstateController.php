<?php

namespace App\Http\Controllers;

use App\Models\TypeOfRealEstate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TypeOfRealEstateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $typeOfRealEstates = TypeOfRealEstate::all();

        return response()->json($typeOfRealEstates);
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

        $typeOfRealEstate = TypeOfRealEstate::create([
            'name' => $request->name
        ]);

        return response()->json($typeOfRealEstate, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param TypeOfRealEstate $typeOfRealEstate
     * @return JsonResponse
     */
    public function show(TypeOfRealEstate $typeOfRealEstate)
    {
        return response()->json($typeOfRealEstate);
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

        $typeOfRealEstate = TypeOfRealEstate::where('id', $id)->update([
            'name' => $request->name,
        ]);

        return response()->json($typeOfRealEstate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TypeOfRealEstate $typeOfRealEstate
     * @return JsonResponse
     */
    public function destroy(TypeOfRealEstate $typeOfRealEstate)
    {
        $typeOfRealEstate->delete();

        return response()->json();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\RealEstate;
use App\Models\TypeOfRealEstate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RealEstateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $realEstates = RealEstate::all();

        return response()->json($realEstates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $this->validate($request, [
            'address' => 'required',
            'price' => 'required',
            'expenses' => 'required',
            'description' => 'required|string',
            'numberOfViews' => 'nullable|integer',
            'livingArea' => 'required|integer',
            'landArea' => 'required|integer',
            'roomNumber' => 'required|integer',
            'bedRoomNumber' => 'required|integer',
            'bathRoomNumber' => 'required|integer',
            'toiletNumber' => 'required|integer',
            'floorNumber' => 'required|integer',
            'constructionYear' => 'nullable|integer',
            'GES'=> 'nullable|integer',
            'DPE' => 'nullable|integer',
            'reference' => 'required',
            'g5e1D_type_of_real_estates_id' => 'required',
            'g5e1D_type_of_heatings_id' => 'required',
            'g5e1D_type_of_water_evacuations_id' => 'required',
            'g5e1D_type_of_contracts_id' => 'required',
            'g5e1D_cities_id' => 'required'
        ]);

        $realEstate = RealEstate::create([
            'address' => $request->address,
            'price' => $request->price,
            'expenses' => $request->expenses,
            'description' => $request->description,
            'numberOfViews' => $request->numberOfViews,
            'livingArea' => $request->livingArea,
            'landArea' => $request->landArea,
            'roomNumber' => $request->roomNumber,
            'bedRoomNumber' => $request->bedRoomNumber,
            'bathRoomNumber' => $request->bathRoomNumber,
            'toiletNumber' => $request->toiletNumber,
            'floorNumber' => $request->floorNumber,
            'constructionYear' => $request->constructionYear,
            'GES'=> $request->GES,
            'DPE' => $request->DPE,
            'archived' => $request->archived = false,
            'reference' =>$request->reference,
            'g5e1D_type_of_real_estates_id' => $request->g5e1D_type_of_real_estates_id,
            'g5e1D_type_of_heatings_id' => $request->g5e1D_type_of_heatings_id,
            'g5e1D_type_of_water_evacuations_id' => $request->g5e1D_type_of_water_evacuations_id,
            'g5e1D_type_of_contracts_id' => $request->g5e1D_type_of_contracts_id,
            'g5e1D_cities_id' => $request->g5e1D_cities_id,

        ]);

        return response()->json($realEstate, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param RealEstate $realEstate
     * @return JsonResponse
     */
    public function show(RealEstate $realEstate)
    {
        return response()->json($realEstate);
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
            'address' => 'required',
            'price' => 'required',
            'expenses' => 'required',
            'description' => 'required|string',
            'numberOfViews' => 'nullable|integer',
            'livingArea' => 'required|integer',
            'landArea' => 'required|integer',
            'roomNumber' => 'required|integer',
            'bedRoomNumber' => 'required|integer',
            'bathRoomNumber' => 'required|integer',
            'toiletNumber' => 'required|integer',
            'floorNumber' => 'required|integer',
            'constructionYear' => 'nullable|integer',
            'GES'=> 'nullable|integer',
            'DPE' => 'nullable|integer',
            'reference' => 'required',
            'g5e1D_type_of_real_estates_id' => 'required',
            'g5e1D_type_of_heatings_id' => 'required',
            'g5e1D_type_of_water_evacuations_id' => 'required',
            'g5e1D_type_of_contracts_id' => 'required',
            'g5e1D_cities_id' => 'required'
        ]);

        $realEstate = RealEstate::where('id', $id)->update([
            'address' => $request->address,
            'price' => $request->price,
            'expenses' => $request->expenses,
            'description' => $request->description,
            'numberOfViews' => $request->numberOfViews,
            'livingArea' => $request->livingArea,
            'landArea' => $request->landArea,
            'roomNumber' => $request->roomNumber,
            'bedRoomNumber' => $request->bedRoomNumber,
            'bathRoomNumber' => $request->bathRoomNumber,
            'toiletNumber' => $request->toiletNumber,
            'floorNumber' => $request->floorNumber,
            'constructionYear' => $request->constructionYear,
            'GES'=> $request->GES,
            'DPE' => $request->DPE,
            'archived' => $request->archived = false,
            'reference' => $request->reference,
            'g5e1D_type_of_real_estates_id' => $request->g5e1D_typye_of_real_estate,
            'g5e1D_type_of_heatings_id' => $request->g5e1D_type_of_heatings_id,
            'g5e1D_type_of_water_evacuations_id' => $request->g5e1D_type_of_water_evacuation_id,
            'g5e1D_type_of_contracts_id' => $request->g5e1D_type_of_contracts_id,
            'g5e1D_cities_id' => $request->g5e1D_cities_id,


        ]);

        return response()->json($realEstate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param RealEstate $realEstate
     * @return JsonResponse
     */
    public function destroy(RealEstate $realEstate)
    {
        $realEstate->delete();

        return response()->json();
    }
}

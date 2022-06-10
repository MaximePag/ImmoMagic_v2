<?php

namespace App\Http\Controllers;

use App\Models\TypeOfWaterEvacuation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TypeOfWaterEvacuationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $typeOfWaterEvacuations = TypeOfWaterEvacuation::all();

        return response()->json($typeOfWaterEvacuations);
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

        $typeOfWaterEvacuation = TypeOfWaterEvacuation::create([
            'name' => $request->name,
        ]);

        return response()->json($typeOfWaterEvacuation, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param TypeOfWaterEvacuation $typeOfWaterEvacuation
     * @return JsonResponse
     */
    public function show(TypeOfWaterEvacuation $typeOfWaterEvacuation)
    {
        return response()->json($typeOfWaterEvacuation);
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

        $typeOfWaterEvacuation = TypeOfWaterEvacuation::where('id', $id)->update([
            'name' => $request->name,
        ]);

        return response()->json($typeOfWaterEvacuation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TypeOfWaterEvacuation $typeOfWaterEvacuation
     * @return JsonResponse
     */
    public function destroy(TypeOfWaterEvacuation $typeOfWaterEvacuation)
    {
        $typeOfWaterEvacuation->delete();

        return response()->json();
    }
}

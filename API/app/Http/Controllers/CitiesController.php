<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $cities = Cities::all();

        return response()->json($cities);
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
            'name' => 'required|max:255',
            'postalCode' => 'required',
        ]);

        $city = Cities::create([
            'name' => $request->name,
            'postalCode' => $request->postalCode,
        ]);

        return response()->json($city, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Cities $cities
     * @return JsonResponse
     */
    public function show(Cities $cities)
    {
        return response()->json($cities);
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
            'name' => 'required|max:255',
            'postalCode' => 'required',
        ]);

        $city = Cities::where('id', $id)->update([
            'name' => $request->name,
            'postalCode' => $request->postalCode,
        ]);

        return response()->json($city);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Cities $cities
     * @return JsonResponse
     */
    public function destroy(Cities $cities)
    {
        $cities->delete();

        return response()->json();
    }
}

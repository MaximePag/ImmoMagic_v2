<?php

namespace App\Http\Controllers;

use App\Models\TypeOfContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use Illuminate\Validation\ValidationException;

class TypeOfContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $typeOfContract = TypeOfContract::all();

        return response()->json($typeOfContract);
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
        ]);

        $typeOfContract = TypeOfContract::create([
            'name' => $request->name,
        ]);

        return \response()->json($typeOfContract,201);
    }

    /**
     * Display the specified resource.
     *
     * @param TypeOfContract $typeOfContract
     * @return JsonResponse
     */
    public function show(TypeOfContract $typeOfContract)
    {
        return \response()->json($typeOfContract);
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
        ]);

        $typeOfContract = TypeOfContract::where('id', $id)
            ->update([
            'name' => $request->name,
        ]);

            return \response()->json($typeOfContract);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TypeOfContract $typeOfContract
     * @return JsonResponse
     */
    public function destroy(TypeOfContract $typeOfContract)
    {
        $typeOfContract->delete();

        return \response()->json();
    }
}

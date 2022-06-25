<?php

namespace App\Http\Controllers;

use App\Models\Favorites;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class FavoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $favorites = Favorites::all();

        return response()->json($favorites);
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
            'g5e1D_real_estate_id' => 'required',
            'g5e1D_users_id' => 'required'
        ]);

        $favorite = Favorites::create([
            'g5e1D_real_estate_id' => $request->g5e1D_real_estate_id,
            'g5e1D_users_id' => $request->g5e1D_users_id
        ]);

        return response()->json($favorite, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Favorites $favorites
     * @return JsonResponse
     */
    public function show(Favorites $favorites): JsonResponse
    {
        return response()->json($favorites);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id): JsonResponse
    {
        $this->validate($request, [
            'g5e1D_real_estate_id' => 'required',
            'g5e1D_users_id' => 'required'
        ]);

        $favorite = Favorites::where('id', $id)->update([
            'g5e1D_real_estate_id' => $request->g5e1D_real_estate_id,
            'g5e1D_users_id' => $request->g5e1D_users_id
        ]);

        return response()->json($favorite);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Favorites $favorites
     * @return JsonResponse
     */
    public function destroy(Favorites $favorites): JsonResponse
    {
        $favorites->delete();

        return response()->json();
    }
}

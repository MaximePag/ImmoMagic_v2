<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $pictures = Picture::all();

        return response()->json($pictures);
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
            'path' => 'required'
        ]);

        $picture = Picture::create([
            'path' => $request->path
        ]);

        return response()->json($picture, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Picture $picture
     * @return JsonResponse
     */
    public function show(Picture $picture)
    {
        return response()->json($picture);
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
            'path' => 'required'
        ]);

        $picture = Picture::where('id', $id)->update([
            'path' => $request->path,
        ]);

        return response()->json($picture);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Picture $picture
     * @return JsonResponse
     */
    public function destroy(Picture $picture)
    {
        $picture->delete();

            return response()->json();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Documents;
use Illuminate\Validation\ValidationException;

class DocumentsController extends Controller
{
    public function index()
    {
        $documents = auth()->user()->documents;

        return response()->json([
            'success' => true,
            'data' => $documents
        ]);
    }

    public function show($id)
    {
        $document = auth()->user()->documents()->find($id);

        if (!$document) {
            return response()->json([
                'success' => false,
                'message' => 'Document not found '
            ], 400);
        }

        return response()->json([
            'success' => true,
            'data' => $document->toArray()
        ], 400);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max: 225',
            'path' => 'required',
            'archived' => 'required|bool',
            'g5e1D_users_id' => 'required'
        ]);

        $document = Documents::create([
            'title' => $request->title,
            'path' => $request->path,
            'archived' => $request->archived,
            'g5e1D_users_id' => $request->g5e1D_users_id,
        ]);


        if (auth()->user()->documents()->save($document))
            return response()->json([
                'success' => true,
                'data' => $document->toArray()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Document not added'
            ], 500);
    }

    public function update(Request $request, $id)
    {
        $document = auth()->user()->documents()->find($id);

        if (!$document) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found'
            ], 400);
        }

        $updated = $document->fill($request->all())->save();

        if ($updated)
            return response()->json([
                'success' => true
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Post can not be updated'
            ], 500);
    }

    public function destroy($id)
    {
        $document = auth()->user()->documents()->find($id);

        if (!$document) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found'
            ], 400);
        }

        if ($document->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Document can not be deleted'
            ], 500);
        }
    }

}


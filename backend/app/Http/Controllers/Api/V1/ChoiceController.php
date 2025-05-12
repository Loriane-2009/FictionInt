<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChoiceRequest;
use App\Http\Resources\ChoiceResource;
use App\Models\Choice;
use App\Models\Chapter;
use Illuminate\Http\Response;

class ChoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only([
            'store',
            'update',
            'destroy',
        ]);
    }

    public function index(Chapter $chapter)
    {
        $choices = $chapter->choices;
        return ChoiceResource::collection($choices);
    }

    public function store(ChoiceRequest $request, Chapter $chapter)
    {
        $validated = $request->validated();

        $choice = $chapter->choices()->create($validated);

        return new ChoiceResource($choice);
    }

    public function show(Choice $choice)
    {
        return new ChoiceResource($choice);
    }

    public function update(ChoiceRequest $request, Choice $choice)
    {
        $choice->update($request->validated());

        return new ChoiceResource($choice);
    }

    public function destroy(Choice $choice)
    {
        $choice->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

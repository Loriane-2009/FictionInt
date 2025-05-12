<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChapterRequest;
use App\Http\Resources\ChapterResource;
use App\Models\Chapter;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChapterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only([
            'store',
            'update',
            'destroy',
        ]);
    }

    public function index(Story $story)
    {
        $chapters = $story->chapters;
        return ChapterResource::collection($chapters);
    }

    public function store(ChapterRequest $request, Story $story)
    {
        $validated = $request->validated();

        $chapter = $story->chapters()->create($validated);

        return new ChapterResource($chapter);
    }

    public function show(Chapter $chapter)
    {
        return new ChapterResource($chapter);
    }

    public function update(ChapterRequest $request, Chapter $chapter)
    {
        $chapter->update($request->validated());

        return new ChapterResource($chapter);
    }

    public function destroy(Chapter $chapter)
    {
        $chapter->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

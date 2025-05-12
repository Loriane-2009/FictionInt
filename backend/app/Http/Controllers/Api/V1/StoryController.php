<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoryRequest;
use App\Http\Resources\StoryResource;
use App\Models\Chapter;
use App\Models\Choice;
use App\Models\Story;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class StoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only([
            'store',
            'update',
            'destroy',
        ]);
    }

    public function index()
    {
        $stories = Story::all();
        return StoryResource::collection($stories);
    }

    public function show(Story $story)
    {
        $story->load(['chapters', 'chapters.choices']);
        return new StoryResource($story);
    }

    public function store(StoryRequest $request)
    {
        $validated = $request->validated();
        $story = Story::create($validated);
        $story->load(['chapters', 'chapters.choices']);
        return new StoryResource($story);
    }

    public function update(StoryRequest $request, Story $story)
    {
        $story->update($request->validated());
        return new StoryResource($story);

    }

    public function destroy(Story $story)
    {
        $story->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

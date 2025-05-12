<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoryRequest;
use App\Http\Resources\StoryResource;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::all();
        return StoryResource::collection($stories);
    }

    public function show(Story $story)
    {
        return new StoryResource($story);
    }

    public function store(StoryRequest $request)
    {
        $validated = $request->validated();

        $story = Story::create($validated);

        return new StoryResource($story);
    }

    public function update(StoryRequest $request, Story $story)
    {
        $validated = $request->validated();

        $story->update($validated);

        return new StoryResource($story);
    }

    public function destroy(Story $story)
    {
        $story->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

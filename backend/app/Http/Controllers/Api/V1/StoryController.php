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

        DB::transaction(function () use ($validated, &$story) {
            $story = Story::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
            ]);

            $chapterIdMap = [];

            foreach ($validated['chapters'] as $index => $chapterData) {
                $chapter = Chapter::create([
                    'story_id' => $story->id,
                    'title' => $chapterData['title'],
                    'content' => $chapterData['content'],
                ]);

                $chapterIdMap[$index] = $chapter->id;
            }
            foreach ($validated['chapters'] as $index => $chapterData) {
                if (!isset($chapterData['choices'])) continue;

                foreach ($chapterData['choices'] as $choice) {
                    Choice::create([
                        'chapter_id' => $chapterIdMap[$index],
                        'choice_text' => $choice['choice_text'],
                        'next_chapter_id' => $chapterIdMap[$choice['next_chapter_index']] ?? null,
                    ]);
                }
            }
        });

        $story->load(['chapters', 'chapters.choices']);
        return new StoryResource($story);
    }

    public function destroy(Story $story)
    {
        $story->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

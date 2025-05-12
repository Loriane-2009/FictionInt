<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chapter extends Model
{
    protected $fillable = [
        'title',
        'content',
        'story_id'
    ];

    public function story(): BelongsTo
    {
        return $this->belongsTo(Story::class);
    }
}

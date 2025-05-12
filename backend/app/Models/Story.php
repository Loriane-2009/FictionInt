<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Story extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    public function chapters(): HasMany
    {
        return $this->hasMany(Chapter::class);
    }
}

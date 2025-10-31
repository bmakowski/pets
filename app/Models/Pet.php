<?php

namespace App\Models;

use Database\Factories\PetFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 */
class Pet extends Model
{
    /** @use HasFactory<PetFactory> */
    use HasFactory;

    /**
     * @var string[]
     */
    protected $appends = ['number_of_likes'];

    /**
     *
     */
    public function getNumberOfLikesAttribute(): int
    {
        return $this->likes()->count();
    }

    /**
     *
     */
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }
}

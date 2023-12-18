<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kanji extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kanji';
    
    protected $fillable = [
        'character',
        'jlpt_level',
        'meanings',
        'readings_on',
        'readings_kun',
        'strokes',
        'radicals',
    ];

    /**
     * Define the relationship with users who have learned this kanji.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function learnedByUsers()
    {
        return $this->belongsToMany(User::class, 'learned_kanji', 'kanji_id', 'user_id')->withTimestamps();
    }
}

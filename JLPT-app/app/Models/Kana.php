<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kana extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'character',
        'pronunciation',
    ];

    /**
     * Define the relationship with users who have learned this kana.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function learnedByUsers()
    {
        return $this->belongsToMany(User::class, 'learned_kana', 'kana_id', 'user_id')->withTimestamps();
    }
}

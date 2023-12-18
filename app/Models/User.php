<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Define the relationship with learned kanji.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function learnedKanji()
    {
        return $this->belongsToMany(Kanji::class, 'learned_kanji', 'user_id', 'kanji_id')->withTimestamps();
    }

    /**
     * Define the relationship with learned kana.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function learnedKana()
    {
        return $this->belongsToMany(Kana::class, 'learned_kana', 'user_id', 'kana_id')->withTimestamps();
    }

    public function challenges()
    {
        return $this->hasMany(Challenge::class);
    }
}

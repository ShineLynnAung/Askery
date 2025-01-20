<?php

namespace App\Models;
use App\Models\Star;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function likes()
{
    return $this->belongsToMany(Post::class, 'stars')->withTimestamps();
}

public function hasLiked(Post $post)
{
    return $this->likes()->where('post_id', $post->id)->exists();
}


public function stars()
{
    return $this->hasMany(Star::class);
}
public function comments(){
    return $this->hasMany(Comment::class);
}

public function posts(){
    return $this->hasMany(Post::class);
}
}

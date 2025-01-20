<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'category',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stars()
{
    return $this->hasMany(Star::class);
}

public function category()
{
    return $this->belongsTo(Category::class, 'category', 'id'); // 'category' is the foreign key in the `posts` table
}
}

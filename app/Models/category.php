<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
        'type',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'category', 'id');
    }
}

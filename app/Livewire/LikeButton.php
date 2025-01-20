<?php

namespace App\Livewire;
use App\Models\Post;

use Livewire\Component;
use Illuminate\Support\Facades\DB;


class LikeButton extends Component
{
    public function render()
    {
        return view('livewire.like-button');
    }

    public function toggleLike()
{
    $this->validate([
        'postId' => 'required|exists:posts,id',
    ]);

    $userId = auth()->id();

    $existingLike = DB::table('stars')->where('post_id', $this->postId)->where('user_id', $userId)->first();

    if ($existingLike) {
        DB::table('stars')->where('id', $existingLike->id)->delete();
        session()->flash('message', 'You have unfavorited the post!');
    } else {
        // Add the like
        DB::table('stars')->insert([
            'post_id' => $this->postId,
            'user_id' => $userId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        session()->flash('message', 'Post favorited successfully!');
    }
}



public $postId;

public function mount($postId)
{
    $this->postId = $postId;
}


public function isLiked()
{
    $userId = auth()->id();
    return DB::table('stars')->where('post_id', $this->postId)->where('user_id', $userId)->exists();
}

}

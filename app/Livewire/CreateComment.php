<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class CreateComment extends Component
{
    public $comments;
    public $postId;
    public $post;
    public $text = ''; 

    protected $rules = [
        'text' => 'required|string|max:1000', // Add validation for the comment text
    ];
    public function mount($postId)
    {
        $this->postId = $postId;
    }

    public function render()
    {
        $this->post = Post::findOrFail($this->postId);
        $this->comments = Comment::where('post_id', $this->postId)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('livewire.create-comment');
    }

    public function createComment()
    {
        $this->validate();

        Comment::create([
            'text' => $this->text,
            'post_id' => $this->postId,
            'user_id' => auth()->id(),
        ]);

        $this->text = '';

        session()->flash('message', 'Comment posted successfully!');

        return view('livewire.create-comment');
    }
}





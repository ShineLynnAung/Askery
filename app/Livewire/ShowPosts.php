<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;


class ShowPosts extends Component
{
    public $posts;
    public function render()
    {
        
        $this->posts= Post::orderBy('created_at', 'desc')->get();
        return view('livewire.show-posts');
    }
}

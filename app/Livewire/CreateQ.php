<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use App\Models\Post;
use App\Models\category;
use Livewire\WithFileUploads;

class CreateQ extends Component
{
    use WithFileUploads;
    public function mount()
    {
        $this->categories = Category::all();
    }
      
       public function render()
    {
        $posts = Post::with('category')->get();   
        return view('livewire.create-q', ['posts' => $posts]);
    }
public $title;
public $description;
public $categories;
public $category;
public $image;
public function qcreate()
{
    $this->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'category' => 'required|int|exists:categories,id',
    ]);

    Post::create([
        'title' => $this->title,
        'description' => $this->description,
        'image' => $this->image ? $this->image->store('posts', 'public') : null,
        'category' => $this->category,
        'user_id' => auth()->id(),
    ]);

    $this->reset(['title', 'description', 'image', 'category']);

    session()->flash('message', 'The post has been created successfully!');
    Redirect()->route('components.layouts.posts');
}

}
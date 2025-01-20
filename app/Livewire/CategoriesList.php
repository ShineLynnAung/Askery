<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CategoriesList extends Component
{
    public $category;

    public $categoryId;

    public function mount($Id)
    {
        $this->categoryId = $Id;
        $this->category = Category::findOrFail($Id);
        $this->loadPosts();
    }

    public function loadPosts()
    {
        $this->posts = Post::where('category', $this->categoryId)
                            ->orderByRaw('CAST(id AS UNSIGNED) DESC')
                            ->get();
    }

    public function render()
    {
        return view('livewire.categories-list', [
            'category' => $this->category,
            'posts' => $this->posts,
        ]);
    }

    public function categories()
    {
        $this->category = DB::table('posts')
            ->where('category', 1)
            ->orderByRaw('CAST(id AS UNSIGNED) DESC')
            ->get();  
    }
    
    // public function mount()
    // {
    //     $this->category = Post::with('categories')
    //         ->orderByRaw('CAST(id AS UNSIGNED) DESC')
    //         ->get();
    // }
}

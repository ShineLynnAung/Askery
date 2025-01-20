<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class Banner extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        // Fetch posts based on the search query
        $posts = Post::with('user')
            ->when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'like', '%' . $query . '%')
                             ->orWhere('description', 'like', '%' . $query . '%')
                             ->orWhereHas('user', function ($subQuery) use ($query) {
                                 $subQuery->where('name', 'like', '%' . $query . '%');
                             });
            })
            ->get();

        return view('search.results', compact('posts'));
    }
}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Search Results</h1>

    @if($posts->isEmpty())
        <p>No posts found for your search query.</p>
    @else
        <ul>
            @foreach($posts as $post)
                <li>
                    <h2>{{ $post->title }}</h2>
                    <p>{{ Str::limit($post->description, 100) }}</p>
                    <p>By: {{ $post->user->name }}</p>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection

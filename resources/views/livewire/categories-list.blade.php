<style>
    
    h4 {
        font-weight: bold;
        color: #000; 
    }

    p {
        font-size: 1rem;
        color: #333; 
    }

    .pu{
        color:#7e7e7e
    }
</style>
<div class="custom-section" style="margin-top:90px">
    <livewire:banner />

<div class="container mb-5">
    @foreach ($posts as $post)
        <div class="mb-3 mt-3 m mb-3">
            <h4 class="mt-3  ms-2 fst-italic">{{ $post->title }}</h4>
            <p class="mt-2 ms-2">{{ $post->description }}</p>
        
            <div class="mt-3">
                <p class="btn btn-primary ms-2 me-2 mt-2 mb-2" style="background-color: #4F5B93; border-color: #4F5B93;">
                 {{ \App\Models\Category::find($post->category)?->type ?? 'Uncategorized' }}
                </p>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <div class="d-flex gap-3 ">
                    <livewire:like-button :postId="$post->id" />
                    <a wire:navigate href="{{ route('comments.create', $post->id)}}">
                    <div class="comment-section">
                        <button class="btn btn-info">
                            <i class="bi bi-chat-dots"></i> Solution
                        </button>
                    </div></a>
                </div>      
                <div class="posted-by-section">
                    <span class="pu">Posted by:{{ $post->user->name }}</span>
                </div>
            </div>
            
    </div>
    @endforeach
</div>
</div>
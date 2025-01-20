<div class="container mb-3" style="min-height: 100vh; display: flex; flex-direction: column;">
    <div class="post">
        <h1 class="mt-5 text-white">{{ $post->title }}</h1>
        <p class="mt-5 text-white cont">{{ $post->description }}</p>
        @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-fluid" style="height: 300px; width:auto;" id="toggleButton1">
        
        @endif
        <div class="mt-3">
            <p class="btn btn-primary ms-2 me-2 mt-2 mb-2" style="background-color: #4F5B93; border-color: #4F5B93;">
                {{ \App\Models\Category::find($post->category)?->type ?? 'Uncategorized' }}

            </p>
        </div>
    </div>

    <div class="d-flex justify-content-between mt-4">
        <div class="d-flex gap-3">
            <div class="comment-section">
                <button class="btn btn-lg text-white">
                    <i class="bi bi-chat-dots-fill icon"></i> {{$comments->count()}}
                </button>
            </div>
        </div>      
        <div class="posted-by-section">
            <span class="text-white">Posted by:{{ $post->user->name }}</span>
        </div>
    </div>
    <hr class="line">

    <!-- Scrollable Comments Section -->
    <div class="comments-container flex-grow-1 overflow-auto" style="padding-bottom: 80px;">
        @foreach ($comments as $comment)
            <div class="comment p-2 m">
                <p class="text-dark">{!! nl2br(e($comment->text)) !!}</p>
                <small class="e">{{ $comment->user->name }} on {{ $comment->created_at->format('F d, Y H:i') }}</small>
            </div>
        @endforeach
    </div>

    <div class="comment-input p-3 shadow" style="position: fixed; bottom: 0; left: 0; width: 100%; background-color: #0D1B2A; border-top: 1px solid #ccc; z-index: 10;">
        <form class="d-flex align-items-center w-100" wire:submit.prevent="createComment">
            <div class="form-group w-100 position-relative container">
                <textarea id="chat" name="comments" rows="1" class="form-control ps-5 pe-5" placeholder="Your answer..." wire:model="text" oninput="autoResize(this)" style="min-height:50px; background:#c4bfbf;"></textarea>
                @error('text') <span class="error text-danger">{{ $message }}</span> @enderror
            
                <button type="submit" class="btn btn-lg position-absolute" style="top: 50%; right: 25px; transform: translateY(-50%);">
                    <i class="bi bi-send-fill"></i>
                </button>
            </div>
              
        </form>
    </div>
    
</div>

<script>
    function autoResize(textarea) {
        textarea.style.height = 'auto';

        textarea.style.height = Math.min(textarea.scrollHeight, 100) + 'px';
    }
</script>

<div class="upvote-section">
    <button class="btn btn-info" style="width:104.32px;" wire:click="toggleLike">
        @if ($this->isLiked())
            <i class="bi bi-star-fill" style="color:gold;"></i> Unstar
        @else
            <i class="bi bi-star" style="font-weight:bold"></i> Star
        @endif
    </button>
</div>


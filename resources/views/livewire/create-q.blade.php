<div class="container mt-4">
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form wire:submit.prevent="qcreate" enctype="multipart/form-data" class="card p-4 shadow-sm form" style="margin-top:99px;width:85%">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input 
                type="text" 
                id="title" 
                wire:model="title" 
                class="f form-control @error('title') is-invalid @enderror">
            @error('title') 
                <div class="invalid-feedback">{{ $message }}</div> 
            @enderror
        </div>
    
        <div class="mb-3">
            <label for="description" class="form-label">Details</label>
            <textarea 
                id="description" 
                wire:model="description" 
                class="f form-control @error('description') is-invalid @enderror" 
                rows="4"></textarea>
            @error('description') 
                <div class="invalid-feedback">{{ $message }}</div> 
            @enderror
        </div>
    
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select id="category" wire:model="category" class="f form-control @error('category') is-invalid @enderror">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" class="text-dark">{{ $category->type }}</option>
                @endforeach
            </select>
            @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        
        <div class="mb-3">
            <label for="image" class="form-label">Image (Optional)</label>
            <input 
                type="file" 
                id="image" 
                wire:model="image" 
                class="f form-control @error('image') is-invalid @enderror"
                onchange="previewImage(event)">
            @error('image') 
                <div class="invalid-feedback">{{ $message }}</div> 
            @enderror
        </div>
    
        <!-- Image Preview Section -->
        <div class="mb-3" id="image-preview-container" style="display: none;">
            <label class="form-label">Image Preview</label>
            <img id="image-preview" src="#" alt="Image Preview" class="img-fluid">
        </div>
    
        <button type="submit" class="btn btn-primary w-100">Create Post</button>
    </form>

    <script>
        function previewImage(event) {
            const input = event.target;
            const previewContainer = document.getElementById('image-preview-container');
            const previewImage = document.getElementById('image-preview');
    
            if (input.files && input.files[0]) {
                const reader = new FileReader();
    
                // When the file is read, set the image source
                reader.onload = function (e) {
                    previewImage.src = e.target.result; // Set the preview image source
                    previewContainer.style.display = 'block'; // Show the preview container
                };
    
                reader.readAsDataURL(input.files[0]); // Read the selected file as Data URL
            } else {
                // Hide the preview container if no file is selected
                previewContainer.style.display = 'none';
                previewImage.src = '#';
            }
        }
    </script>
    
</div>

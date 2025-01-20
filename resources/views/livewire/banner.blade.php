<style>
    .banner{
        width:100%;
        height: 400px;
        background: #6C63FF;
        position: relative;
      }

      .content{
        background: #6C63FF;
      }
      .search-container {
  width: 60%; 
  margin: 0 auto;
}
.search-input {
  border-radius: 30px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  height: 45px;
}
.search-icon {
  position: absolute;
  top: 50%;
  left: 15px;
  transform: translateY(-50%);
  color: #888;
}
.form-control::placeholder {
  color: #aaa;
}

.icon {
  font-size: 150px;
  color: #fff; /* White icon color */
  position: absolute;
  opacity: 30%;
}

/* Random positions for icons */
.icon:nth-child(1) {
  top: 20px;
  left: 30px;
}


.icon:nth-child(2) {
  bottom: 20px;
  right: 30px;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.x.x/cdn.min.js" defer></script>

<div class="banner d-flex justify-content-center align-items-center text-center">
    <i class="bi bi-chat-dots icon"></i>
    <i class="bi bi-lightbulb icon"></i>
        <div class="w-100 content">
          <h1 class="mb-4 fw-bold text-white content">Welcome To ASKERY</h1>
          <div class="search-container content">
            <form class="position-relative content">
              <i class="bi bi-search search-icon bg-white"></i>
              <input type="text" 
               class="form-control ps-5 search-input" 
               placeholder="What’s on your mind?" 
               wire:model.debounce.300ms="searchItem"
               autocomplete="off">
          </form>
          <div wire:loading>
            <p>Loading...</p>
        </div>
    
        <ul class="list-group mt-3">
            @if(!empty($searchItem))
                @if($posts && $posts->count() > 0)
                    @foreach($posts as $p)
                        <li class="list-group-item">
                            <strong>Title:</strong> {{$p->title}}<br>
                            <strong>Description:</strong> {{$p->description}}<br>
                            <strong>By:</strong> {{$p->user->name}}
                        </li>
                    @endforeach
                @else
                    <p class="text-danger mt-2">No Posts Found</p>
                @endif
            @endif
        </ul>
          </div>
        </div>
      </div>
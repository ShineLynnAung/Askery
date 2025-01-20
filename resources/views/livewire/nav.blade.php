<style>

         
.navbar {
        height: 90px; 
        background: #24242f;
    }

    .navbar .nav-link {
        line-height: 90px; 
    }

    .logot{
      font-size: 2em;
      font-weight: bold;
    }
    .nat{
      font-size: 1.2em;
      font-weight: bold;
    }
    
    .line{
      border: 1px solid white;
    }
 
  </style>
<div class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand text-white logot ms-3" wire:navigate href="#">ASKERY</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto me-4">
          <li class="nav-item ms-auto me-4">
            <a class="nav-link text-white active nat" wire:navigate href="{{ route('components.layouts.posts') }}">Q&A</a>
          </li>
          <li class="nav-item ms-auto me-4">
            <a class="nav-link text-white active nat" wire:navigate href="{{ route('qcreate') }}">Ask</a>
          </li>
          <li class="nav-item ms-auto me-4">
            <a class="nav-link text-white active nat" wire:navigate href="{{ route('favpost') }}">Favourite List</a>
          </li>
          <li class="nav-item dropdown ms-auto me-5">
            <a class="nav-link dropdown-toggle text-white ms-auto me-4 nat" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ (auth()->user()->name) }}
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" wire:navigate href="#">Profile</a></li>
              <li><a class="dropdown-item" wire:navigate href="{{ route('setting') }}">Setting</a></li>
              <li><hr class="dropdown-divider line"></li>
              <li>
                {{-- <a class="dropdown-item text-danger" onclick="Logout()" wire:navigate href="#">Logout</a> --}}
                <button class="btn btn-link dropdown-item text-danger" onclick="Logout()">Logout</button>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
      function Logout() {
      Swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, logout!',
        cancelButtonText: 'No, stay logged in',
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Logged Out!',
            'You have been successfully logged out.',
            'success'
          ).then(() => {
            window.location.href = '{{ route('logout') }}'; 
          });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          Swal.fire(
            'Cancelled',
            'You are still logged in.',
            'info'
          );
        }
      });
    }</script> 
</div>
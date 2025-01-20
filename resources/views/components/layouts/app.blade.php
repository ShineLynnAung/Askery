<?php
use App\Models\Category;

$categories = Category::all(); // Fetch all categories
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Askery' }}</title>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>

          body 
              {
                background: #0D1B2A;
              }     
     .navbar {
              height: 90px; 
              background: #24242f;
              position: fixed;
              z-index: 900;
              top:0;
              width: 100%;
          }

          .navbar .nav-link {
              line-height: 90px; 
              
          }

          /* .nav-item{
            background: #24242f;
              height: 90px;
              width: 100%;
          } */
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

          .m {
        background: #cdcecf;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px; 
        color: #333; 
    }

    .dropdown-menu{
      z-index: 999;
    }
    .icon{
      color:white;
    }

    .nav-link.active{
      color:#3df42c !important;
    }
         
        </style>
    </head>
    <body>
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand text-white logot ms-3" wire:navigate href="#">ASKERY</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto me-4">
              <li class="nav-item ms-auto me-4">
                <a class="nav-link text-white nat" wire:navigate href="{{ route('components.layouts.posts') }}">FAQ Space</a>
              </li>
              <li class="nav-item ms-auto me-4">
                <a class="nav-link text-white nat" wire:navigate href="{{ route('qcreate') }}">Ask & Share</a>
              </li>
              {{-- //my actitives list --}}
              
              <li class="nav-item dropdown ms-auto me-4">
                <a class="nav-link dropdown-toggle text-white nat" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    My Space
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" wire:navigate href="{{ route('favpost') }}">Starred</a></li>
                    <li><a class="dropdown-item" wire:navigate href="{{ route('inquiries') }}">My Inquiries</a></li>
                    <li><a class="dropdown-item" wire:navigate href="{{route('Contributions')}}">My Contributions</a></li>
                </ul>
            </li>
            
            <li class="nav-item dropdown ms-auto me-4">
              <a class="nav-link dropdown-toggle text-white nat" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Categories
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                @foreach($categories as $category)
                <li>
                    <a class="dropdown-item" wire:navigate href="{{ route('categories', ['Id' => $category->id]) }}">
                        {{ $category->type }}
                    </a>
                </li>
            @endforeach
              </ul>
          </li>

              {{--setting--}}
              <li class="nav-item dropdown ms-auto me-5">
                <a class="nav-link dropdown-toggle text-white ms-auto me-4 nat" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ (auth()->user()->name) }}
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" wire:navigate href="#">Profile</a></li>
                  <li><a class="dropdown-item" wire:navigate href="{{ route('profile') }}">Setting</a></li>
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
      </nav>
      {{ $slot }}

      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
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
    }
    </script>   

    </body>
</html>


<?php

use App\Http\Controllers\SearchController;
use App\Livewire\Contributions;
use App\Livewire\CreateComment;
use App\Livewire\CategoriesList;
use App\Livewire\CreateQ;
use App\Livewire\Favpost;
use App\Livewire\MyInquiries;
use App\Livewire\ShowPosts;
use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'livewire/dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    // Route::view('setting', 'livewire.setting')
    // ->middleware(['auth'])
    // ->name('setting');

    Route::get('/search-results', [SearchController::class, 'index'])->name('search.results');

    Route::view('/result', 'livewire.result')->name('result');

    // Route::view('banner', 'livewire.banner')
    // ->name('banner');

    Route::get('/logout', [Logout::class, 'performLogout'])
    ->middleware(['auth'])
    ->name('logout');

Route::get('/inquiries', MyInquiries::class)->name('inquiries');
Route::get('/favpost', Favpost::class)->name('favpost');
Route::get('/Contributions', Contributions::class)->name('Contributions');
Route::get('/posts', ShowPosts::class)->name('components.layouts.posts');
Route::get('/qcreate', CreateQ::class)->name("qcreate");

Route::get('/categories/{Id}', CategoriesList::class)->name('categories');

Route::get('/posts/{postId}/comments', CreateComment::class)->name('comments.create');
require __DIR__.'/auth.php';

<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;


class Favpost extends Component
{
    public $stars;
    public function render()
    {
        
        return view('livewire.favpost');
    }

    public function favpost(){
        $this->stars = DB::table('stars')->where('user_id', 1)->orderByRaw('CAST(id AS UNSIGNED) DESC')->get();}

    public function mount()
{
    $this->stars = auth()->user()->stars()
        ->with('post.user')->get();
}
}

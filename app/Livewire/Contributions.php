<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Contributions extends Component
{
    public $Contributions;
    public function render()
    {
        return view('livewire.contributions');
    }

    public function Contributions(){
        $this->Contributions = DB::table('comments')->where('user_id', 1)->orderByRaw('CAST(id AS UNSIGNED) DESC')->get();}

    public function mount()
{
    $this->Contributions = auth()->user()->comments()
        ->with('post.user')->get();
}
}

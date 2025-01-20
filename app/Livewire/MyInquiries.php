<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
class MyInquiries extends Component
{
    public $inquiries;
    public function render()
    {
        return view('livewire.my-inquiries');
    }

    public function inquiries(){
        $this->inquiries = DB::table('posts')->where('user_id', 1)->orderByRaw('CAST(id AS UNSIGNED) DESC')->get();  
    }

    public function mount()
    {
        $this->inquiries = auth()->user()->posts()
            ->with('user')
            ->orderByRaw('CAST(id AS UNSIGNED) DESC')
            ->get();
    }
}

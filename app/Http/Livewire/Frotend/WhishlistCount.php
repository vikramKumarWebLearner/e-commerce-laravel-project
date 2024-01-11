<?php

namespace App\Http\Livewire\Frotend;

use App\Models\Whishlist;
use Auth;
use Livewire\Component;

class WhishlistCount extends Component
{
    public $whishListCount;

    protected $listeners = ['whishlistUpdate' => 'checkwhishlistcount'];

    public function checkwhishlistcount()
    {
        if (Auth::check()) {
            return $this->whishListCount = Whishlist::where('user_id', Auth()->user()->id)->count();
        } else {
            return $this->whishListCount = 0;

        }
    }

    public function render()
    {
        $this->whishListCount = $this->checkwhishlistcount();

        return view('livewire.frotend.whishlist-count', ['whishlistcount' => $this->whishListCount]);
    }
}

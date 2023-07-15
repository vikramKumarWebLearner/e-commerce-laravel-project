<?php

namespace App\Http\Livewire\Frotend;

use App\Models\Whishlist;
use Livewire\Component;

class WhishlistShow extends Component
{
    public function removeWhishlist(int $whishId)
    {
        $this->emit('whishlistUpdate');
        Whishlist::where('user_id', auth()->user()->id)->where('id', $whishId)->delete();
        $this->dispatchBrowserEvent('message', [
            'text' => 'Whishlist Product Delete Successfully',
            'type' => 'info',
            'status' => 200,
        ]);
    }

    public function render()
    {
        $whishlist = Whishlist::where('user_id', Auth()->user()->id)->get();

        return view('livewire.frotend.whishlist-show', ['whishlist' => $whishlist]);
    }
}

<?php

namespace App\Http\Livewire\Frotend;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartCount extends Component
{
    public $cartCount = 0;

    protected $listeners = ['cartAddedOrUpdated' => 'checkCartCount'];

    public function checkCartCount()
    {
        if (Auth::check()) {
            return $this->cartCount = Cart::where('user_id', auth()->user()->id)->count();
        } else {

            $this->cartCount = 0;
        }
    }

    public function render()
    {
        $this->cartCount = $this->checkCartCount();

        return view('livewire.frotend.cart-count', ['message' => $this->cartCount]);
    }
}

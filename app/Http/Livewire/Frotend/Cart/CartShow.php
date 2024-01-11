<?php

namespace App\Http\Livewire\Frotend\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart;

    public $totalprice = 0;

    public function decrementQuntity(int $cartItemId)
    {

        $cartData = Cart::where('id', $cartItemId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            if ($cartData->productColor()->where('id', $cartData->product_color_id)->exists()) {
                $productColor = $cartData->productColor()->where('id', $cartData->product_color_id)->first();
                if ($productColor->quantity > $cartData->quantity) {
                    $cartData->decrement('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Cart Item decrement',
                        'type' => 'info',
                        'status' => 200,
                    ]);
                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only'.$productColor->quantity.'Update Quantity',
                        'type' => 'info',
                        'status' => 200,
                    ]);
                }
            } else {
                if ($cartData->product->quantity > $cartData->quantity) {

                    $cartData->decrement('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Cart Item decrement',
                        'type' => 'info',
                        'status' => 200,
                    ]);
                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only '.$cartData->product->quantity.'Update Quantity',
                        'type' => 'info',
                        'status' => 200,
                    ]);
                }
            }

        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong',
                'type' => 'error',
                'status' => 404,
            ]);
        }

    }

    public function incrementQuntity(int $cartItemId)
    {
        $cartData = Cart::where('id', $cartItemId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            if ($cartData->productColor()->where('id', $cartData->product_color_id)->exists()) {
                $productColor = $cartData->productColor()->where('id', $cartData->product_color_id)->first();
                if ($productColor->quantity > $cartData->quantity) {
                    $cartData->increment('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Cart Item increment',
                        'type' => 'info',
                        'status' => 200,
                    ]);
                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only'.$productColor->quantity.'Update Quantity',
                        'type' => 'info',
                        'status' => 200,
                    ]);
                }
            } else {
                if ($cartData->product->quantity > $cartData->quantity) {

                    $cartData->increment('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Cart Item increment',
                        'type' => 'info',
                        'status' => 200,
                    ]);
                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only '.$cartData->product->quantity.'Update Quantity',
                        'type' => 'info',
                        'status' => 200,
                    ]);
                }
            }

        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong',
                'type' => 'error',
                'status' => 404,
            ]);
        }

    }

    public function cartItemRemove(int $cartItemId)
    {
        $cartItemData = Cart::where('id', $cartItemId)->where('user_id', auth()->user()->id)->first();

        if ($cartItemData) {
            $cartItemData->delete();
            $this->emit('cartAddedOrUpdated');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Cart Item Remove Successfully',
                'type' => 'success',
                'status' => 200,
            ]);
        }
    }

    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();

        return view('livewire.frotend.cart.cart-show', ['carts' => $this->cart]);
    }
}

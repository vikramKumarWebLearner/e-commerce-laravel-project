<?php

namespace App\Http\Livewire\Frotend\Product;

use App\Models\Cart;
use App\Models\Whishlist;
use Auth;
use Livewire\Component;

class View extends Component
{
    public $categorys;

    public $products;

    public $productColorSelectedQuantity;

    public $quantity = 1;

    public $productColor;

    public function addWishList($productId)
    {
        $this->emit('whishlistUpdate');
        if (Auth::check()) {

            if (Whishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                session()->flash('message', 'Already added to whishlist Product');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Already added to whishlist Product',
                    'type' => 'warning',
                    'status' => 409,
                ]);

                return false;
            } else {
                $whishlist = new Whishlist;
                $whishlist->user_id = auth()->user()->id;
                $whishlist->product_id = $productId;
                $whishlist->save();
                session()->flash('message', 'Added Whishlist Product');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Added Whishlist Product',
                    'type' => 'info',
                    'status' => 200,
                ]);

                return true;
            }
        } else {
            session()->flash('message', 'Please User Login');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please User Login',
                'type' => 'error',
                'status' => 401,
            ]);

            return false;
        }
    }

    public function colorSelected($coloritem)
    {
        $this->productColor = $coloritem;
        $productColor = $this->products->productColor()->where('id', $coloritem)->first();
        $this->productColorSelectedQuantity = $productColor->quantity;

        if ($this->productColorSelectedQuantity == 0) {
            $this->productColorSelectedQuantity = 'outofStock';

        }

    }

    public function decrementQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }

    }

    public function incrementQuantity()
    {
        if ($this->quantity < 10) {
            $this->quantity++;
        }

    }

    public function addCartList(int $productId)
    {
        if (Auth::check()) {
            if ($this->products->where('id', $productId)->where('status', '0')->exists()) {
                if ($this->products->productColor()->count() > 1) {
                    if ($this->productColorSelectedQuantity != null) {

                        if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->where('product_color_id', $this->productColor)->exists()) {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Product Already Added',
                                'type' => 'warning',
                                'status' => 200,
                            ]);
                        } else {
                            $productColor = $this->products->productColor()->where('id', $this->productColor)->first();
                            if ($productColor->quantity > 0) {
                                if ($productColor->quantity > $this->quantity) {
                                    Cart::create([
                                        'user_id' => Auth()->user()->id,
                                        'product_id' => $productId,
                                        'product_color_id' => $this->productColor,
                                        'quantity' => $this->quantity,
                                    ]);
                                    $this->emit('cartAddedOrUpdated');
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Product Added to Cart',
                                        'type' => 'success',
                                        'status' => 200,
                                    ]);
                                } else {
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Only '.$productColor->quantity.' Quantity Available',
                                        'type' => 'warning',
                                        'status' => 404,
                                    ]);
                                }
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => ' Out of Stock',
                                    'type' => 'warning',
                                    'status' => 404,
                                ]);
                            }
                        }
                    } else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Select your Product Color',
                            'type' => 'warning',
                            'status' => 404,
                        ]);
                    }
                } else {
                    if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Product Already Added',
                            'type' => 'warning',
                            'status' => 200,
                        ]);
                    } else {
                        if ($this->products->quantity > 0) {
                            if ($this->products->quantity > $this->quantity) {
                                Cart::create([
                                    'user_id' => Auth()->user()->id,
                                    'product_id' => $productId,
                                    'quantity' => $this->quantity,
                                ]);
                                $this->emit('cartAddedOrUpdated');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Product Added to Cart',
                                    'type' => 'success',
                                    'status' => 200,
                                ]);
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Only '.$this->products->quantity.' Quantity Available',
                                    'type' => 'warning',
                                    'status' => 404,
                                ]);
                            }
                        } else {
                            $this->dispatchBrowserEvent('message', [
                                'text' => ' Out of Stock',
                                'type' => 'warning',
                                'status' => 404,
                            ]);
                        }
                    }
                }
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => ' Product Not Aviable',
                    'type' => 'warning',
                    'status' => 404,
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please User Login',
                'type' => 'error',
                'status' => 401,
            ]);
        }
    }

    public function mount($category, $product)
    {
        $this->categorys = $category;
        $this->products = $product;
    }

    public function render()
    {
        return view('livewire.frotend.product.view', ['product' => $this->products, 'category' => $this->categorys]);
    }
}

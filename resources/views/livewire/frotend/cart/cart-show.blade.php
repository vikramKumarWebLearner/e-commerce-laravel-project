<div>

    <div class="py-3 py-md-5" style="margin: 100px ">
        <div class="container">
            <h4>My Cart</h4>
            <hr>
            <div class="row">
                <div class="col-md-12 col">
                    <div class="shopping-cart">
                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            @if($carts->isNotEmpty())
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Products</h4>
                                    </div>
                                    <div class="col-md-1">
                                        <h4>Price</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Quantity</h4>
                                    </div>
                                    <div class="col-md-1">
                                        <h4>Total</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Remove</h4>
                                    </div>
                                </div>
                            @endif
                        </div>
                           
                        @forelse ($carts as $cartItem)
                            @if ($cartItem->product)
                                <div class="cart-item">
                                    <div class="row">
                                        <div class="col-md-6 my-auto">
                                            <a
                                                href="{{ url('collections/' . $cartItem->product->category->slug . '/' . $cartItem->product->slug) }}">
                                                <label class="product-name">
                                                    @if ($cartItem->product->productImage)
                                                        <img src="{{ asset($cartItem->product->productImage[0]->image) }}"
                                                            style="width: 50px; height: 50px"
                                                            alt=" {{ $cartItem->product->name }}">
                                                    @endif
                                                    {{ $cartItem->product->name }}

                                                    @if ($cartItem->productColor)
                                                        @if ($cartItem->productColor->color)
                                                            <span>-Color :
                                                                {{ $cartItem->productColor->color->name }}</span>
                                                        @endif
                                                    @endif
                                                </label>
                                            </a>
                                        </div>
                                        <div class="col-md-1 my-auto">
                                            <label class="price">{{ $cartItem->product->selling_price }}</label>
                                        </div>
                                        <div class="col-md-2 col-7 my-auto">
                                            <div class="quantity">
                                                <div class="input-group">
                                                    <button type="button" wire:loading.attr="disabled"
                                                        wire:click="decrementQuntity({{ $cartItem->id }})"
                                                        class="btn btn1"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="{{ $cartItem->quantity }}"
                                                        class="input-quantity" />
                                                    <button type="button" wire:loading.attr="disabled"
                                                        wire:click="incrementQuntity({{ $cartItem->id }})"
                                                        class="btn btn1"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1 my-auto">
                                            <label
                                                class="price">{{ $cartItem->product->selling_price * $cartItem->quantity }}</label>
                                            @php
                                                $totalprice += $cartItem->product->selling_price * $cartItem->quantity;
                                            @endphp
                                        </div>
                                        <div class="col-md-2 col-5 my-auto">
                                            <div class="remove">
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="cartItemRemove({{ $cartItem->id }})"
                                                    class="btn btn-danger btn-sm">
                                                    <span wire:loading.remove
                                                        wire:target="cartItemRemove({{ $cartItem->id }})">
                                                        <i class="fa fa-trash"></i> Remove
                                                    </span>
                                                    <span wire:loading
                                                        wire:target="cartItemRemove({{ $cartItem->id }})">
                                                        <i class="fa fa-trash"></i> Removeing...
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <div>
                                <h4 class="text-center"><i class="fa fa-solid fa-xmark"></i>No Cart Data</h4>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 my-md-auto mt-5">
                    <h5 class="mt-5">
                        Get the best deals & offers <a href="{{ url('collections') }}">shop now</a>
                    </h5>
                </div>
                @if($carts->isNotEmpty())
                    <div class="col-md-4 mt-3">
                        <div class="shadow-sm bg-white p-3">
                            <h4>Total:
                                <span class="float-end">{{ $totalprice }}</span>
                            </h4>
                            <hr>
                                <a href="{{ url('/checkout') }}" class="btn btn-warning w-100">Checkout</a>
                        </div>
                    </div>
                @endif
            </div>

        </div>

    </div>

</div>

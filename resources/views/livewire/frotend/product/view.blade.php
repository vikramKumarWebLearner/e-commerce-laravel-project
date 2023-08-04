<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border" wire:ignore>
                        {{-- <img src="{{ asset($product->productImage[0]->image) }}" class="w-100" alt="Img"> --}}
                        <div class="exzoom" id="exzoom">
                            <div class="exzoom_img_box">
                                <ul class='exzoom_img_ul'>
                                    @foreach ($product->productImage as $productImage)
                                        <li><img src="{{ asset($productImage->image) }}" /></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="exzoom_nav"></div>
                            <p class="exzoom_btn">
                                <a href="javascript:void(0);" class="exzoom_prev_btn">
                                    < </a>

                                        <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>

                            </p>

                        </div>

                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name }}
                            {{-- <label class="label-stock bg-success">In Stock</label> --}}
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{ $product->category->name }} / Product / {{ $product->name }}
                        </p>
                        <div>
                            <span class="selling-price">{{ $product->selling_price }}</span>
                            <span class="original-price">{{ $product->original_price }}</span>
                        </div>
                        <div>
                            @if ($product->productColor->count() > 0)
                                @if ($product->productColor)
                                    @foreach ($product->productColor as $coloritem)
                                        {{-- <input type="radio" name="colorSelection" value="{{$coloritem->id}}" id=""> {{$coloritem->color->name}} --}}
                                        <label class="colorSelectionLabel"
                                            style="background-color: {{ $coloritem->color->name }}; border:1.5px solid black; width:55px; text-align:center; border-radius:5px;"
                                            wire:click="colorSelected({{ $coloritem->id }})">{{ $coloritem->color->name }}</label>
                                    @endforeach
                                @endif

                                <div>
                                    @if ($this->productColorSelectedQuantity == 'outofStock')
                                        <label class="btn btn-sm py-1 mt-1 text-white bg-danger">Out Of Stock</label>
                                    @elseif($this->productColorSelectedQuantity > 0)
                                        <label class="btn btn-sm py-1 mt-1 text-white bg-success">In Stock</label>
                                    @endif
                                </div>
                            @else
                                @if ($product->quantity)
                                    <label class="btn btn-sm py-1 mt-1 text-white bg-success">In Stock</label>
                                @else
                                    <label class="btn btn-sm py-1 mt-1 text-white bg-danger">Out Of Stock</label>
                                @endif
                            @endif

                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementQuantity()"><i
                                        class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantity" value="{{ $this->quantity }}"
                                    class="input-quantity" />
                                <span class="btn btn1" wire:click="incrementQuantity()"><i
                                        class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click="addCartList({{ $product->id }})" class="btn btn1"> <i
                                    class="fa fa-shopping-cart"></i> Add To Cart</button>
                            <button class="btn btn1" wire:click="addWishList({{ $product->id }})">
                                <span wire:loading.remove wire:target="addWishList">
                                    <i class="fa fa-heart"></i> Add To Wishlist
                                </span>

                                <span wire:loading wire:target="addWishList">Adding...</span>
                            </button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {{ $product->small_desc }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {{ $product->description }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="py-3 py-md-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>
                        Related
                        @if ($category->name)
                            {{ ucfirst($category->name) }}
                        @endif
                        Product
                    </h4>
                    <div class="underline"></div>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme trending-product">
                        @foreach ($category->relatedProduct as $productsitem)
                            <div class="item mb-3" wire:ingonre>
                                <div class="product-card">
                                    <div class="product-card-img">
                                        @if ($productsitem->productImage->count() > 0)
                                            <a
                                                href="{{ url('/collections/' . $productsitem->category->slug . '/' . $productsitem->slug) }}">
                                                <img src="{{ asset($productsitem->productImage[0]->image) }}"
                                                    alt="{{ $productsitem->name }}">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="product-card-body">
                                        <p class="product-brand">{{ $productsitem->brand }}</p>
                                        <h5 class="product-name">
                                            <a
                                                href="{{ url('/collections/' . $productsitem->category->slug . '/' . $productsitem->slug) }}">
                                                {{ $productsitem->name }}
                                            </a>
                                        </h5>
                                        <div>
                                            <span class="selling-price">{{ $productsitem->selling_price }}</span>
                                            <span class="original-price">{{ $productsitem->original_price }}</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>
                        Related
                        @if ($product->brand)
                            {{ ucfirst($product->brand) }}
                        @endif
                        Product
                    </h4>
                    <div class="underline"></div>
                </div>

                <div class="col-md-12">
                    <div class="owl-carousel owl-theme trending-product">
                        @foreach ($category->relatedProduct as $productsitem)
                            @if ($productsitem->brand == "$product->brand")
                                <div class="item mb-3" wire:ingonre>
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            @if ($productsitem->productImage->count() > 0)
                                                <a
                                                    href="{{ url('/collections/' . $productsitem->category->slug . '/' . $productsitem->slug) }}">
                                                    <img src="{{ asset($productsitem->productImage[0]->image) }}"
                                                        alt="{{ $productsitem->name }}">
                                                </a>
                                            @endif
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $productsitem->brand }}</p>
                                            <h5 class="product-name">
                                                <a
                                                    href="{{ url('/collections/' . $productsitem->category->slug . '/' . $productsitem->slug) }}">
                                                    {{ $productsitem->name }}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">{{ $productsitem->selling_price }}</span>
                                                <span class="original-price">{{ $productsitem->original_price }}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $('.trending-product').owlCarousel({
            loop: true,
            margin: 10,
            dots: false,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 2
                }

            }
        })
        $(function() {
            $("#exzoom").exzoom({
                // thumbnail nav options
                "navWidth": 60,
                "navHeight": 60,
                "navItemNum": 5,
                "navItemMargin": 7,
                "navBorder": 1,
                // autoplay
                "autoPlay": true,
                // autoplay interval in milliseconds
                "autoPlayTimeout": 2000
            });
        });
    </script>
@endpush

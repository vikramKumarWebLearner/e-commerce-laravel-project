<div>
    <div class="row">
        <div class="col-md-3">
         <div class="card">
            <div class="card-header"><h4>Brands</h4></div>
            <div class="card-body">
                @foreach ($category->brands as $brandItem)
                    <label class="d-block">
                        <input type="checkbox" value="{{$brandItem->name}}" wire:model="brand"> {{$brandItem->name}}
                    </label>
                @endforeach
            </div>
         </div>

         <div class="card mt-5">
            <div class="card-header"><h4>Price</h4></div>
            <div class="card-body">
                    <label class="d-block">
                        <input type="radio" name="price" value="High-to-Low" wire:model="price"> High to Low 
                    </label>
                    <label class="d-block">
                        <input type="radio" name="price" value="Low-to-High" wire:model="price"> Low to High
                    </label>
            </div>
         </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse ($products as $productsitem)
                    <div class="col-md-4">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if ($productsitem->quantity > 0)
                                    <label class="stock bg-success">In Stock</label>
                                @else
                                    <label class="stock bg-danger">Out Stock</label>
                                @endif

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
                                {{-- <div class="mt-2">
                <a href="" class="btn btn1">Add To Cart</a>
                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                <a href="" class="btn btn1"> View </a>
            </div> --}}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="p-2">
                            <h5>No Products</h5>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

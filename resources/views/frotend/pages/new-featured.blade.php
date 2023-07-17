@extends('layouts.app')

@section('title', 'Cart List')

@section('content')

    <div class="py-5 ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>New featured Product</h4>
                    <div class="underline"></div>
                </div>
                @forelse ($featuredProduct as $productsitem)
                    <div class="col-md-3" wire:ingonre>
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
                @empty
                    <div class="col-md-12 p-2">
                        <h5>No Products</h5>
                    </div>
                @endforelse
                <div class="text-center">
                    <a href="{{ url('/arrivals') }}" class="btn btn-warning px-4 mt-2">shop more</a>
                </div>
            </div>
        </div>

    @endsection

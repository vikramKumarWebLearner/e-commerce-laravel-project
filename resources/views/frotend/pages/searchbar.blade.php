@extends('layouts.app')

@section('title', 'Search Product')

@section('content')

    <div class="py-5  grid-margin">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h4>Search Result</h4>
                    <div class="underline"></div>
                </div>
                @forelse ($searchProduct as $productsitem)
                    <div class="col-md-10 mt-5">
                        <div class="product-card">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="product-card-img">
                                        @if ($productsitem->productImage->count() > 0)
                                            <a
                                                href="{{ url('/collections/' . $productsitem->category->slug . '/' . $productsitem->slug) }}">
                                                <img src="{{ asset($productsitem->productImage[0]->image) }}"
                                                    alt="{{ $productsitem->name }}">
                                            </a>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="product-card-body">
                                        <p class="product-brand ">{{ $productsitem->brand }}</p>
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
                                        <p style="height:45px; overflow:hidden">
                                            <b>Description : </b>{{ $productsitem->description }}
                                        </p>
                                        <a href="{{ url('/collections/' . $productsitem->category->slug . '/' . $productsitem->slug) }}"
                                            class="btn btn-outline-primary" style="width:100px;">
                                            View
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 p-2">
                        <h5>No Search Products</h5>
                    </div>
                @endforelse
                <div class="col-md-10">
                    {{ $searchProduct->appends(request()->input())->links() }}
                </div>
            </div>
        </div>

    @endsection

@extends('layouts.app')

@section('title', 'Home Page')


@section('content')
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-inner">
            @foreach ($sliders as $key => $slider)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset("$slider->image") }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="custom-carousel-content">
                            <h1> {!! $slider->title !!}</h1>
                            <p>{!! $slider->desc !!}</p>
                            <div>
                                <a href="#" class="btn btn-slider">Get Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h4>Welcome to Funda of Web IT E-Commerce</h4>
                    <div class="underline" style="margin: auto; "></div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas, reprehenderit ipsa laudantium
                        asperiores nulla sequi consectetur temporibus doloribus saepe, commodi laborum maxime dolores!
                        Ratione obcaecati consequatur veniam aliquid odit provident officia doloribus minima, dolor porro,
                        hic quod. Laborum culpa possimus, atque enim reiciendis facilis non! Aliquam nisi illum pariatur
                        necessitatibus, error eaque obcaecati hic? Repellat quasi deleniti culpa temporibus. Veniam et
                        repudiandae laboriosam commodi vitae repellendus eius, soluta quos eveniet voluptatem in eos
                        praesentium alias, ex quidem consequatur explicabo atque quisquam reprehenderit distinctio deserunt
                        reiciendis? Similique enim aperiam amet provident a laborum laboriosam sequi sunt doloribus dolorem.
                        Recusandae, tenetur dolorum?
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5 bg-white ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 ">
                    <h4>Trending Product</h4>
                    <div class="underline"></div>

                    <div class="col-md-12" wire:ingonre>
                        <div class="owl-carousel owl-theme trending-product">
                            @if ($trendingProducts)
                                @foreach ($trendingProducts as $productsitem)
                                    <div class="item">
                                        <div class="trending-product">
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
                                                        <span
                                                            class="selling-price">{{ $productsitem->selling_price }}</span>
                                                        <span
                                                            class="original-price">{{ $productsitem->original_price }}</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-md-12">
                                    <div class="p-2">
                                        <h5>No Products</h5>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 ">
                    <h4>New Arrival Products
                        <a href="{{ url('arrivals') }}" class="btn btn-warning float-end">View More</a>
                    </h4>
                    <div class="underline"></div>

                    <div class="col-md-12" wire:ingonre>
                        <div class="owl-carousel owl-theme trending-product">
                            @if ($newArrivalProducts)
                                @foreach ($newArrivalProducts as $productsitem)
                                    <div class="item">
                                        <div class="trending-product">
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
                                                        <span
                                                            class="selling-price">{{ $productsitem->selling_price }}</span>
                                                        <span
                                                            class="original-price">{{ $productsitem->original_price }}</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-md-12">
                                    <div class="p-2">
                                        <h5>No Arrivals Products</h5>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 ">
                    <h4>New featured Products
                        <a href="{{ url('featured') }}" class="btn btn-warning float-end">View More</a>
                    </h4>
                    <div class="underline"></div>

                    <div class="col-md-12" wire:ingonre>
                        <div class="owl-carousel owl-theme trending-product">
                            @if ($featuredProducts)
                                @foreach ($featuredProducts as $productsitem)
                                    <div class="item">
                                        <div class="trending-product">
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
                                                        <span
                                                            class="selling-price">{{ $productsitem->selling_price }}</span>
                                                        <span
                                                            class="original-price">{{ $productsitem->original_price }}</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-md-12">
                                    <div class="p-2">
                                        <h5>No Featured Products</h5>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
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
    </script>
@endsection

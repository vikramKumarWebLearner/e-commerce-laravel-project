@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Products
                        <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ url('admin/products') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">
                                    Home
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seotag-tab" data-bs-toggle="tab"
                                    data-bs-target="#seotag-tab-pane" type="button" role="tab"
                                    aria-controls="seotag-tab-pane" aria-selected="false">
                                    SEO Tags
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                    data-bs-target="#details-tab-pane" type="button" role="tab"
                                    aria-controls="details-tab-pane" aria-selected="false">
                                    Details
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="productImage-tab" data-bs-toggle="tab"
                                    data-bs-target="#productImage-tab-pane" type="button" role="tab"
                                    aria-controls="productImage-tab-pane" aria-selected="false">
                                    Product Image
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="color-tab" data-bs-toggle="tab"
                                    data-bs-target="#color-tab-pane" type="button" role="tab"
                                    aria-controls="color-tab-pane" aria-selected="false">
                                    Product Color
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <div class="mb-3 mt-3">
                                    <label for="category">Select Category</label>
                                    <select name="category_id" class="form-control p-3" id="category">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="name">Product Name</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="slug">Product Slug</label>
                                    <input type="text" name="slug" id="slug" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="brand">select Brand</label>
                                    <select name="brand_id" class="form-control p-3" id="category">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->name }}" {{ $brand->id }}>{{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="small_desc">Small Description (500 words)</label>
                                    <textarea name="small_desc" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="desc"> Description</label>
                                    <textarea name="description" class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab"
                                tabindex="0">
                                <div class="mb-3 mt-3">
                                    <label for="meta_title">SEO Title</label>
                                    <input type="text" name="meta_title" id="meta_title" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="meta_keyword">SEO Keyword</label>
                                    <input type="text" name="meta_keyword" id="meta_keyword" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="meta_desc">SEO Description</label>
                                    <input type="text" name="meta_desc" id="meta_desc" class="form-control">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="details-tab-pane" role="tabpanel"
                                aria-labelledby="details-tab" tabindex="0">
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="original_price">Original Price</label>
                                            <input type="numb" name="original_price" id="original_price"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="selling_price">Selling Price</label>
                                            <input type="numb" name="selling_price" id="selling_price"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="quantity">Quantity</label>
                                            <input type="numb" name="quantity" id="quantity" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="trending">Trending</label>
                                            <input type="checkbox" name="trending" id="trending"
                                                style="width:25px; height:25px;">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="featured">Featured</label>
                                            <input type="checkbox" name="featured" id="featured"
                                                style="width:25px; height:25px;">
                                        </div>
                                    </div>
                                    <div class="col-md-3 mt-4">
                                        <div class="mb-3">
                                            <label for="status m-2">Status</label>
                                            <input type="checkbox" name="status" id="status"
                                                class="form-check-input">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="productImage-tab-pane" role="tabpanel"
                                aria-labelledby="productImage-tab" tabindex="0">
                                <div class="row mt-3">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for="image">Product Image</label>
                                            <input type="file" name="image[]" id="image" class="form-control"
                                                multiple>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade border mb-3" id="color-tab-pane" role="tabpanel"
                                aria-labelledby="color-tab" tabindex="0">
                                <div class=" m-3 ">
                                    <div class="row ">
                                        <label for="color mb-3">Select Color</label>
                                        @forelse ($colors as $colorItem)
                                            <div class="col-md-3">
                                                <div class="p-2 border mb-3">
                                                    Color: <input type="checkbox" name="colors[{{ $colorItem->id }}]"
                                                        value="{{ $colorItem->id }}" />
                                                    {{ $colorItem->name }}
                                                    <br>
                                                    Quantity: <input type="number"
                                                        name="colorquantity[{{ $colorItem->id }}]" id=""
                                                        style="width:70px; border:1px solid;">
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-md-3">
                                                <h1>No Color Found</h1>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 ">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

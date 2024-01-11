@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Product
                        <a href="{{ url('admin/products') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body border">
                    @if (session('message'))
                        <h2 class="alert alert-success">{{ session('message') }}</h2>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ url('admin/product/' . $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
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
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="name">Product Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ $product->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="slug">Product Slug</label>
                                    <input type="text" name="slug" id="slug" class="form-control"
                                        value="{{ $product->slug }}">
                                </div>
                                <div class="mb-3">
                                    <label for="brand">select Brand</label>
                                    <select name="brand_id" class="form-control p-3" id="category">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                {{ $brand->name == $product->name ? 'selected' : '' }}>{{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="small_desc">Small Description (500 words)</label>
                                    <textarea name="small_desc" class="form-control" rows="4">{{ $product->small_desc }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="desc"> Description</label>
                                    <textarea name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab"
                                tabindex="0">
                                <div class="mb-3 mt-3">
                                    <label for="meta_title">SEO Title</label>
                                    <input type="text" name="meta_title" id="meta_title" class="form-control"
                                        value="{{ $product->meta_title }}">
                                </div>
                                <div class="mb-3">
                                    <label for="meta_keyword">SEO Keyword</label>
                                    <input type="text" name="meta_keyword" id="meta_keyword" class="form-control"
                                        value="{{ $product->meta_title }}">
                                </div>
                                <div class="mb-3">
                                    <label for="meta_desc">SEO Description</label>
                                    <input type="text" name="meta_desc" id="meta_desc" class="form-control"
                                        value="{{ $product->meta_title }}">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="details-tab-pane" role="tabpanel"
                                aria-labelledby="details-tab" tabindex="0">
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="original_price">Original Price</label>
                                            <input type="numb" name="original_price" id="original_price"
                                                class="form-control" value="{{ $product->original_price }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="selling_price">Selling Price</label>
                                            <input type="numb" name="selling_price" id="selling_price"
                                                class="form-control" value="{{ $product->selling_price }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="quantity">Quantity</label>
                                            <input type="numb" name="quantity" id="quantity" class="form-control"
                                                value="{{ $product->quantity }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="trending">Trending</label>
                                            <input type="checkbox" name="trending" id="trending"
                                                class="form-check-input" {{ $product->trending == '1' ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="featured">Featured</label>
                                            <input type="checkbox" name="featured" id="featured"
                                                {{ $product->featured == '1' ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="status m-2">Status</label>
                                            <input type="checkbox" name="status" id="status"
                                                class="form-check-input" {{ $product->trending == '1' ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="productImage-tab-pane" role="tabpanel"
                                aria-labelledby="productImage-tab" tabindex="0">
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="image">Product Image</label>
                                            <input type="file" name="image[]" id="image" class="form-control"
                                                multiple>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row row-cols-1 row-cols-md-4  mt-3">
                                        @if ($product->productImage)
                                            @foreach ($product->productImage as $image)
                                                <div class="col m-1">
                                                    <div class="card">
                                                        <img src="{{ url($image->image) }}" class="card-img-top"
                                                            alt="image not found">
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{ $product->name }}</h5>
                                                            <a href="{{ url('admin/product_image/' . $image->id . '/delete') }}"
                                                                class="btn btn-sm btn-dark">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <h5>No Image Added</h5>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab"
                                tabindex="0">
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
                                <div class="table-responsive mb-2">
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <th>Color Name</th>
                                                <th>Quantity</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product->productColor as $productColor)
                                                <tr class="prod-color-tr">
                                                    <td>{{ $productColor->color->name }}</td>
                                                    <td>
                                                        <div class="input-group mb-3 " style="width:150px;">
                                                            <input type="text" name="" id=""
                                                                class="productColorQuantity form-control from-control-sm"
                                                                value="{{ $productColor->quantity }}">
                                                            <button type="button" value="{{ $productColor->id }}"
                                                                class="updateColorBtn btn btn-sm btn-primary btn-sm text-white">Update</button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" value="{{ $productColor->id }}"
                                                            class="deleteColorBtn btn btn-sm btn-danger btn-sm text-white">Deleate</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', ".updateColorBtn", function() {
                var product_id = "{{ $product->id }}";
                var prod_color_id = $(this).val();
                var quantity = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();

                if (quantity <= 0) {
                    alert('Quantity is required');
                    return false;
                }

                var data = {
                    'product_id': product_id,
                    'quantity': quantity
                };

                $.ajax({
                    type: 'POST',
                    url: '/admin/product-color/' + prod_color_id,
                    data: data,
                    success: function(response) {
                        alert(response.message);
                    }
                })

            });

            $(document).on('click', '.deleteColorBtn', function() {
                var prod_color_id = $(this).val();
                var thisClick = $(this);

                $.ajax({
                    type: 'GET',
                    url: '/admin/product_color/' + prod_color_id + '/delete',
                    success: function(response) {
                        thisClick.closest('.prod-color-tr').remove();
                        alert(response.message);

                    }
                });

            });

        });
    </script>
@endsection

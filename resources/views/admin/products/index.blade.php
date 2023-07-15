@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Products
                    <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm float-end">Add Products</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-responsive-sm">
                    <thead>
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col">Category</th>
                          <th scope="col">Product</th>
                          <th scope="col">Price</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>
                                    @if ($product->category)
                                     {{$product->category->name}}                                     
                                     @else
                                         No Category
                                     @endif
                                    
                                </td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->selling_price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->status == true ? 'hidden':'visible'}}</td>
                                <td>
                                    <a href="{{url('/admin/products/'.$product->id.'/edit')}}" class="btn  btn-success">Edit</a>
                                    
                                    <a href="{{url('admin/product/'.$product->id.'/delete')}}" onclick="return confirm('Are you sure, you want to delete this data?')" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="7">No Brand Found</td>
                        </tr>
                        @endforelse
                      </tbody>
                  </table>
            </div>
        </div> 
    </div> 
</div>  
@endsection
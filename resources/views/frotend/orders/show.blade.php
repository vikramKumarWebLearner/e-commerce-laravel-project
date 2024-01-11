@extends('layouts.app')

@section('title', 'Orders List')

@section('content')

    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            <i class="fa fa-shopping-cart text-dark"></i> My Order Detial
                            <a href="{{ url('orders') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>My Order Details</h5>
                                <hr>
                                <h6>Order Id : {{ $order->id }}</h6>
                                <h6>Tracking No : {{ $order->tracking_no }}</h6>
                                <h6>Order Date : {{ $order->created_at }}</h6>
                                <h6>Payment Mode : {{ $order->payment_mode }}</h6>
                                <h6 class="border p-2 text-success">
                                    Order Status Message : <span class="text-uppercase">{{ $order->status_message }}</span>
                                </h6>
                            </div>
                            <div class="col-md-6 mb-5">
                                <h5>User Details</h5>
                                <hr>
                                <h6>Username : {{ $order->fullname }}</h6>
                                <h6>Email : {{ $order->email }}</h6>
                                <h6>Phone Number: {{ $order->phone }}</h6>
                                <h6>Address : {{ $order->address }}</h6>
                                <h6>Pincode : {{ $order->pincode }}</h6>
                            </div>
                            <h5 class="mt-2 mb-3">Order item</h5>
                            <hr>
                            <div class="table-responsive ">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Item Id</th>
                                            <th>Image</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalAmount = 0;
                                        @endphp
                                        @foreach ($order->orderItem as $order)
                                            <tr>
                                                <td width="10%">{{ $order->id }}</td>
                                                <td width="10%">
                                                    <img src="{{ asset($order->product->productImage[0]->image) }}"
                                                        alt="" width="70px" height="40px">
                                                </td>
                                                <td>
                                                    {{ $order->product->name }}
                                                    @if ($order->productColor)
                                                        @if ($order->productColor->color)
                                                            <span class="fw-bold">-Color :
                                                                {{ $order->productColor->color->name }} </span>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>{{ $order->price }}</td>
                                                <td>{{ $order->quantity }}</td>
                                                <td>{{ $order->quantity * $order->price }}</td>
                                                @php
                                                    $totalAmount += $order->quantity * $order->price;
                                                @endphp
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="5" class="fw-bold">Total Amount</td>
                                            <td colspan="1" class="fw-bold">{{ $totalAmount }}</td>
                                        </tr>



                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('title', 'Orders List')

@section('content')
    @if (session('message'))
        <h2 class="alert alert-success">{{ session('message') }}</h2>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Orders Details
                        <a href="{{ url('admin/orders') }}" class="btn btn-danger btn-sm  float-end ">Back</a>
                        <a href="{{ url('admin/invoice/' . $order->id . '/generateInvoice') }}"
                            class="btn btn-primary btn-sm float-end mx-1" target="_blank">Download Invoice</a>
                        <a href="{{ url('admin/invoice/' . $order->id) }}" class="btn btn-warning btn-sm float-end mx-1"
                            target="_blank">View
                            Invoice</a>
                        <a href="{{ url('admin/invoice/' . $order->id . '/mail') }}"
                            class="btn btn-info btn-sm float-end mx-1">
                            Send Mail</a>
                    </h3>
                </div>
                <div class="card-body">
                    </i> My Order Detial
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
                                    @foreach ($order->orderItem as $orders)
                                        <tr>
                                            <td width="10%">{{ $orders->id }}</td>
                                            <td width="10%">
                                                <img src="{{ asset($orders->product->productImage[0]->image) }}"
                                                    alt="" width="70px" height="40px">
                                            </td>
                                            <td>
                                                {{ $orders->product->name }}
                                                @if ($orders->productColor)
                                                    @if ($orders->productColor->color)
                                                        <span class="fw-bold">-Color :
                                                            {{ $order->productColor->color->name }} </span>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>{{ $orders->price }}</td>
                                            <td>{{ $orders->quantity }}</td>
                                            <td>{{ $orders->quantity * $orders->price }}</td>
                                            @php
                                                $totalAmount += $orders->quantity * $orders->price;
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



            <div class="card  mt-3">
                <div class="card-header">
                    <h4 class="mt-2">Order Process (Order Status Updates)</h4>
                    <hr>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <form action="{{ url('admin/orders/' . $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <label for="">Update Your Order Status</label>
                                    <div class="input-group">
                                        <select name="status_message" class="form-select">
                                            <option value="">Select All Status</option>
                                            <option value="in progress"
                                                {{ Route::get('status') == 'in progress' ? 'selected' : '' }}>In Progress
                                            </option>
                                            <option value="completed"
                                                {{ Route::get('status') == 'completed' ? 'selected' : '' }}>
                                                Completed</option>
                                            <option value="pending"
                                                {{ Route::get('status') == 'pending' ? 'selected' : '' }}>
                                                Pending</option>
                                            <option value="cancelled"
                                                {{ Route::get('status') == 'cancelled' ? 'selected' : '' }}>
                                                Cancelled</option>
                                            <option value="out-of-delivaery"
                                                {{ Route::get('status') == 'out-of-delivaery' ? 'selected' : '' }}>Out of
                                                delivaery
                                            </option>
                                        </select>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-7">
                                <br>
                                <h4 class="mt-2">Order Status Message : <span
                                        class="text-uppercase">{{ $order->status_message }}</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

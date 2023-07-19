@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session('message'))
                <h2 class="alert alert-success">{{ session('message') }}</h2>
            @endif

            <div class="me-md-3 me-xl-5">
                <h2>Dashboard</h2>
                <p class="mb-md-0">Your analytics dashboard template.</p>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-4">
                    <div class="card card-body bg-primary text-white mb-3">
                        <label>Total User All</label>
                        <h5 class="mt-1">{{ $totalUserAll }}</h5>
                        <a href="{{ url('admin/users') }}" class="text-white">view</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-body bg-success text-white mb-3">
                        <label>Total User</label>
                        <h5 class="mt-1">{{ $totalUser }}</h5>
                        <a href="{{ url('admin/users') }}" class="text-white">view</a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-body bg-warning text-white mb-3">
                        <label>Total Admin</label>
                        <h5 class="mt-1">{{ $totalAdmin }}</h5>
                        <a href="{{ url('admin/users') }}" class="text-white">view</a>
                    </div>
                </div>
            </div>
            <hr>


            <div class="row">
                <div class="col-md-4">
                    <div class="card card-body bg-warning text-white mb-3">
                        <label>Total Product</label>
                        <h5 class="mt-1">{{ $totalProduct }}</h5>
                        <a href="{{ url('admin/orders') }}" class="text-white">view</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-body bg-primary text-white mb-3">
                        <label>Today Order</label>
                        <h5 class="mt-1">{{ $totalCategories }}</h5>
                        <a href="{{ url('admin/orders') }}" class="text-white">view</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-body bg-success text-white mb-3">
                        <label>Total Month Order</label>
                        <h5 class="mt-1">{{ $totalBrand }}</h5>
                        <a href="{{ url('admin/orders') }}" class="text-white">view</a>
                    </div>
                </div>

            </div>
            <hr>

            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body bg-danger text-white mb-3">
                        <label>Total Order</label>
                        <h5 class="mt-1">{{ $totalOrder }}</h5>
                        <a href="{{ url('admin/orders') }}" class="text-white">view</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-info text-white mb-3">
                        <label>Today Order</label>
                        <h5 class="mt-1">{{ $todayOrder }}</h5>
                        <a href="{{ url('admin/orders') }}" class="text-white">view</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-success text-white mb-3">
                        <label>Total Month Order</label>
                        <h5 class="mt-1">{{ $thisMonthOrder }}</h5>
                        <a href="{{ url('admin/orders') }}" class="text-white">view</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-warning text-white mb-3">
                        <label>Total Year Order</label>
                        <h5 class="mt-1">{{ $thisYearOrder }}</h5>
                        <a href="{{ url('admin/orders') }}" class="text-white">view</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

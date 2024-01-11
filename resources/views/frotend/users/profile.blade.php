@extends('layouts.app')

@section('title', 'User Profile')

@section('content')

    <div class="py-5 ">
        <div class="container">
            @if (session('message'))
                <div class="alert alert-warning">{{ session('message') }}</div>
            @endif
            <div class="row">
                <div class="col-md-10">
                    <a href="{{ url('user-password') }}" class="btn btn-warning float-end">User Password?</a>
                    <h4>User Deatil Update</h4>
                    <div class="underline"></div>


                </div>
                <div class="col-md-10">
                    <div class="card shadow">
                        <form action="{{ url('/profile') }}" method="POST">
                            @csrf
                            <div class="card-header bg-primary mb-0">
                                <h4 class="text-white ">User Deatail</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="label-control">Name</label>
                                        <input type="text" name="name" value="{{ Auth::user()->name }}"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="label-control">Email</label>
                                        <input type="text" name="email" class="form-control"
                                            value="{{ Auth::user()->email }}">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="label-control">Phone Number</label>
                                        @if (Auth::user()->userDetail)
                                            <input type="text" name="phone" class="form-control"
                                                    value="{{ Auth::user()->userDetail->phone}}">
                                        @else
                                            <input type="text" name="phone" class="form-control" placeholder='12345678'>
                                        @endif
                                        
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="label-control">Pin Code / Zip Code</label>
                                        @if (Auth::user()->userDetail)
                                        <input type="text" name="code" class="form-control"
                                            value="{{ Auth::user()->userDetail->pincode }}">
                                        @else
                                            <input type="text" name="code" class="form-control">
                                        @endif
                                    </div>
                                    <div class="col-md-12
                                            mt-3">
                                        <label for="label-control mb-3">Address</label>
                                        @if(Auth::user()->userDetail)
                                            <textarea name="address" cols="10" class="form-control">
                                                {{ Auth::user()->userDetail->address }}
                                            </textarea>
                                        @else
                                            <textarea name="address" cols="10" class="form-control"></textarea>
                                        @endif
                                    </div>
                                </div>
                                <div class=" mt-4 ">
                                    <button type="submit" class="btn  btn-primary w-100 ">Save</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

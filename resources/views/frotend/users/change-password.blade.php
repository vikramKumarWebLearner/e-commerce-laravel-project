@extends('layouts.app')

@section('title', 'User Profile')

@section('content')

    <div class="py-5 ">
        <div class="container">
            @if (session('message'))
                <div class="alert alert-warning">{{ session('message') }}</div>
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $errors)
                    <div class="alert alert-warning">{{ $errors }}</div>
                @endforeach
            @endif
            <div class="row">
                <div class="col-md-10">
                    <a href="{{ url('profile') }}" class="btn btn-danger float-end"
                        style="width:100px; font-size:19px;">Back</a>
                    <h4>User Password Update</h4>
                    <div class="underline"></div>


                </div>
                <div class="col-md-10">
                    <div class="card shadow">
                        <form action="{{ url('/user-password-update') }}" method="POST">
                            @method('PUT')
                            @csrf

                            <div class="card-header bg-primary mb-0">
                                <h4 class="text-white ">User Password </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="label-control">Current Password</label>
                                        <input type="text" name="current_password" class="form-control">
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label for="label-control">New Password</label>
                                        <input type="text" name="password" class="form-control">
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label for="label-control">Confirm Password</label>
                                        <input type="text" name="password_confirmation" class="form-control">
                                    </div>

                                </div>
                                <div class=" mt-4 ">
                                    <button type="submit" class="btn  btn-primary w-100 ">Update Password</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

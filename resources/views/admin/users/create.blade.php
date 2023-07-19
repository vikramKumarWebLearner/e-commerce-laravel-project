@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add User
                        <a href="{{ url('admin/users') }}" class="btn btn-danger btn-sm text-white float-end">Back</a>
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
                    <form action="{{ url('admin/user') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>


                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control">
                            </div>


                            <div class="col-md-6 mt-3">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" id="" class="form-select">
                                    <option value="">select user</option>
                                    <option value="1">Admin</option>
                                    <option value="0">User</option>
                                </select>
                            </div>


                            <div class="col-md-6 mt-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="m-3 float-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

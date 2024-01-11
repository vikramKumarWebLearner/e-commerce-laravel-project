@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Update User
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
                    <form action="{{ url('admin/user/' . $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            </div>


                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                            </div>


                            <div class="col-md-6 mt-3">

                                <label for="role" class="form-label">Role</label>
                                <select name="role" class="form-select">
                                    @if ($user->role_as == '0')
                                        <option value="{{ $user->role_as }}">
                                            @if ($user->role_as == '0')
                                                User
                                            @endif
                                        </option>
                                    @endif
                                    @if ($user->role_as == '1')
                                        <option value="{{ $user->role_as }}">
                                            @if ($user->role_as == '1')
                                                Admin
                                            @endif
                                        </option>
                                    @endif
                                    <option value="0">User</option>
                                </select>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" name="password" class="form-control" value="{{ $user->password }}">
                            </div>
                        </div>
                        <div class="m-3 float-end">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

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
                        <a href="{{ url('admin/user/create') }}" class="btn btn-primary btn-sm float-end">Add Users</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-responsive-sm">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Email_Verfied</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>

                                    <td>
                                        @if ($user->role_as == '1')
                                            <label class="badge btn-success">Admin</label>
                                        @elseif ($user->role_as == '0')
                                            <label class="badge btn-primary">User</label>
                                        @else
                                            <label class="badge btn-danger">User</label>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($user->email_verified_at == null)
                                            <i class="mdi mdi-alert-decagram menu-icon"
                                                style="font-size:22px; color:red"></i>
                                        @else
                                            <i class="mdi mdi-check-circle" style="font-size:22px; color:green"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('/admin/user/' . $user->id . '/edit') }}"
                                            class="btn  btn-success">Edit</a>

                                        <a href="{{ url('admin/user/' . $user->id . '/delete') }}"
                                            onclick="return confirm('Are you sure, you want to delete this data?')"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No Users Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

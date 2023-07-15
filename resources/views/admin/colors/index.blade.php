@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Colors
                    <a href="{{ url('admin/color/create') }}" class="btn btn-primary btn-sm float-end">Add Color</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Code</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            
                            </tr>
                    </thead>
                      <tbody>
                            @forelse ($colors as $color)
                             <tr>
                                <td>{{$color->id}}</td>
                                <td>{{$color->name}}</td>
                                <td>{{$color->code}}</td>
                                <td>{{$color->status == 1 ? 'Hidden':'Visible'}}</td>
                                <td>
                                    <a href="{{url('admin/color/'.$color->id.'/edit')}}" class="btn btn-success">Edit</a>
                                    <a href="{{url('admin/color/'.$color->id.'/delete')}}" class="btn btn-danger" onclick="return confirm('Are you sure want to delete')">Delete</a>
                                </td>
                             </tr>
                            @empty
                                    <tr>
                                        <td colspan="5">No Brand Found</td>
                                    </tr>
                            @endforelse
                      </tbody>
                </table>
            </div>
        </div> 
    </div> 
</div>  


@endsection
@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Sliders List
                        <a href="{{ url('admin/slides/create') }}" class="btn btn-primary btn-sm float-end">Add Slider</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sliders as $slider)
                                <tr>
                                    <td>{{$slider->id}}</td>
                                    <td>{{$slider->title}}</td>
                                    <td>{{$slider->desc}}</td>
                                    <td>
                                        <img src="{{asset($slider->image)}}" alt="" style="width: 70px; height:70px;">
                                    </td>
                                    <td>
                                        {{$slider->status == 1?'Hidden':'visiable'}}
                                    </td>
                                    <td>
                                        <a href="{{url('admin/slider/'.$slider->id.'/edit')}}" class="btn btn-success">Edit</a>
                                        <a href="{{url('admin/slider/'.$slider->id.'/delete')}}" class="btn btn-danger" onclick="return confirm('Are you sure want to delete')">Delete</a>
                                    </td>
                                </tr>
                            @empty
                           <tr>
                            <td colspan="6">No Slider Found</td>
                           </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

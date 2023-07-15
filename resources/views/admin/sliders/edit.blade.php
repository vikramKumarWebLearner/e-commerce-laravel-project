@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Update Slider
                        <a href="{{ url('admin/sliders') }}" class="btn btn-danger btn-sm text-white float-end">Back</a>
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
                    <form action="{{ url('admin/sliders/'.$slider->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{$slider->title}}">
                        </div>
                        <div class="mb-3">
                            <label for="desc">Description</label>
                            <textarea name="desc" class="form-control" rows="4">{{$slider->desc}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="" class="form-control mb-2">
                            <img src="{{url($slider->image)}}" style="width:150px; height:100px;" alt="">
                        </div>
                        <div class="mb-3">
                            <label for="status">Status</label>
                            <input type="checkbox" name="status"  {{$slider->status =='1'? 'checked':''}} id="status" ><br>
                             1=Hidden , 0=Visiable
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

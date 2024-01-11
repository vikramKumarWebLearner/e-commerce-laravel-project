@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Category
                        <a href="{{ url('admin/category') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/category/'.$category->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="{{$category->name}}">
                                @error('name') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="name">Slug</label>
                                <input type="text" name="slug" class="form-control"value="{{$category->slug}}" >
                                @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="name">Description</label>
                                <textarea name="desc" rows="3" class="form-control">{{$category->desc}}</textarea>
                                @error('desc') <small class="text-danger" >{{$message}}</small> @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="name">Image</label>
                                <input type="file" name="image" class="form-control" value="{{asset('uploads/category/'.$category->image)}}">
                                @error('image') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3 mt-2 ">
                                <label for="name">Status</label><br>
                                <input type="checkbox" class="form-check-input" name="status" {{$category->status == '1' ? 'checked':''}}>
                            </div>
                            <div class="col-md-12 mb-3">
                                <img src="{{ asset('uploads/category/'.$category->image)}}" width="60px" height="60px" alt="Server Error">
                            </div>
                            <div class="col-md-6 mb-3">
                                <h3>SEO Tags</h3>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="name">Meta Title</label>
                                <textarea name="meta_title" rows="3" class="form-control">{{$category->meta_title}}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="name">Meta Keyword</label>
                                <textarea name="meta_keyword" rows="3" class="form-control">{{$category->meta_keyword}}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="name">Meta Description</label>
                                <textarea name="meta_desc" rows="3" class="form-control">{{$category->meta_desc}}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary float-end">Update</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Category
                        <a href="{{ url('admin/category') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/category')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control">
                                @error('name') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="name">Slug</label>
                                <input type="text" name="slug" class="form-control">
                                @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="name">Description</label>
                                <textarea name="desc" rows="3" class="form-control"></textarea>
                                @error('desc') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="name">Image</label>
                                <input type="file" name="image" class="form-control">
                                @error('image') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3 mt-2">
                                <label for="name">Status</label><br>
                                <input type="checkbox" name="status">
                            </div>

                            <div class="col-md-6 mb-3">
                                <h3>SEO Tags</h3>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="name">Meta Title</label>
                                <textarea name="meta_title" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="name">Meta Keyword</label>
                                <textarea name="meta_keyword" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="name">Meta Description</label>
                                <textarea name="meta_desc" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary float-end">Save</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

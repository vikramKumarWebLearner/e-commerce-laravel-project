@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Update Color
                        <a href="{{ url('admin/colors') }}" class="btn btn-danger btn-sm text-white float-end">Back</a>
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
                    <form action="{{ url('admin/color/'.$color[0]->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name">Color Name</label>
                            <input type="text" name="name" id="name" value="{{$color[0]->name}}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="code">Color Code </label>
                            <input type="text" name="code" id="code" class="form-control" value="{{$color[0]->code}}">
                        </div>
                        <div class="mb-3">
                            <label for="status">Status</label>
                            <input type="checkbox" name="status" id="status" {{$color[0]->status == 1 ?'selected':''}} >
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

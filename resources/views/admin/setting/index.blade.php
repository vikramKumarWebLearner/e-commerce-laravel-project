@extends('layouts.admin')

@section('title', 'Setting Page')


@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin ">

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <form action="{{ url('admin/store') }}" method="POST">
                @csrf

                <div class="card mb-3 shadow-sm  bg-body-tertiary rounded">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="form-label">Website Name</label>
                                <input type="text" class="form-control" name="website_name"
                                    value="{{ $setting->website_name }}">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Website URL</label>
                                <input type="text" class="form-control" name="website_url"
                                    value="{{ $setting->website_url }}">
                            </div>
                            <div class="col-md-12 mt-4">
                                <label for="" class="form-label">Page Title</label>
                                <input type="text" class="form-control" name="page_title"
                                    value="{{ $setting->page_title }}">
                            </div>
                            <div class="col-md-6 mt-4">
                                <label for="" class="form-label">Meta Keyword</label>
                                <input type="text" class="form-control" name="meta_keyword"
                                    value="{{ $setting->meta_keyword }}">
                            </div>
                            <div class="col-md-6 mt-4">
                                <label for="" class="form-label">Meta Description</label>
                                <input type="text" class="form-control" name="meta_desc"
                                    value="{{ $setting->meta_desc }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3 shadow-sm  bg-body-tertiary rounded">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="form-label"> Address</label>
                                <input type="text" class="form-control" name="address" value="{{ $setting->address }}">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Phone 1</label>
                                <input type="text" class="form-control" name="phone_1" value="{{ $setting->phone_1 }}">
                            </div>
                            <div class="col-md-6 mt-4">
                                <label for="" class="form-label">Phone 2</label>
                                <input type="text" class="form-control" name="phone_2" value="{{ $setting->phone_2 }}">
                            </div>
                            <div class="col-md-6 mt-4">
                                <label for="" class="form-label">Email 1</label>
                                <input type="text" class="form-control" name="email_1" value="{{ $setting->email_1 }}">
                            </div>
                            <div class="col-md-6 mt-4">
                                <label for="" class="form-label">Email 2</label>
                                <input type="text" class="form-control" name="email_2" value="{{ $setting->email_2 }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3 shadow-sm  bg-body-tertiary rounded">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website - Social Media</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="form-label">Facebook</label>
                                <input type="text" class="form-control" name="facebook" value="{{ $setting->facbook }}">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Twitter</label>
                                <input type="text" class="form-control" name="twitter"
                                    value="{{ $setting->twitter }}">
                            </div>
                            <div class="col-md-6 mt-4">
                                <label for="" class="form-label">Instagram</label>
                                <input type="text" class="form-control" name="instagram"
                                    value="{{ $setting->instagram }}">
                            </div>
                            <div class="col-md-6 mt-4">
                                <label for="" class="form-label">YouTube</label>
                                <input type="text" class="form-control" name="youtube"
                                    value="{{ $setting->youtube }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="float-end">
                    <button type="submit" class="btn btn-lg btn-primary bg-primary text-white">Save Setting</button>
                </div>
            </form>
        </div>
    </div>
@endsection

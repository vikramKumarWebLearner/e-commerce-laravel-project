
@extends('layouts.app')

@section('title', 'Product')

@section('title')
    {{$products->meta_title}}
@endsection

@section('meta_keyword')
    {{$products->meta_keyword}}
@endsection

@section('meta_desc')
    {{$products->meta_title}}
@endsection

@section('content')
     
   <div>
       <livewire:frotend.product.view :category="$category" :product="$products"/>
   </div>

@endsection

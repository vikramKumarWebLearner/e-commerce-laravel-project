@extends('layouts.app')

@section('title', 'Thank You Page')

@section('content')

    <div class="content" style="margin-top:100px; margin-bottom:50px;">
        @if (session('message'))
            <h5 class="alert alert-success mt-3">{{ session('message') }}</h5>
        @endif
        <div class="wrapper-1">
            <div class="wrapper-2">
                <h1>Thank you !</h1>
                <p>Thanks for Shopping </p>
                {{-- <p>you should receive a confirmation email soon  </p> --}}
                <a href="{{ url('/') }}"><button class="go-home">
                        go home
                    </button> </a>
            </div>
            <div class="footer-like">
                <p>Product Coming Soon Recevied
                    <a href="{{ url('collections') }}">Shopping now</a>
                </p>
            </div>
        </div>
    </div>


@endsection

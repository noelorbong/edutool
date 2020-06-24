@extends('layouts.admin')

@section('content')
<section id="home" class="video-section js-height-full">
    <div class="overlay"></div>
    <div class="home-text-wrapper relative container">
        <div class="home-message">
            <p>Making Evaluation Easy!</p>
            <small>This website helps educators create evaluation tool such as Test Questions and Table of Specification
                easy.</small>
            @guest
            <div class="btn-wrapper">
                <div class="text-center">
                    <a href="/register" class="btn btn-primary wow slideInLeft">Sign Up</a> &nbsp;&nbsp;&nbsp;
                    <a href="/login" class="btn btn-default wow slideInRight">Log In</a>
                </div>
            </div><!-- end row -->
            @else
            <div class="btn-wrapper">
                <div class="text-center">
                </div>
            </div><!-- end row -->
            @endguest

        </div>
    </div>
    <div class="slider-bottom">
        <span>Explore <i class="fa fa-angle-down"></i></span>
    </div>
</section>
@endsection
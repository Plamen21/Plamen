@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100 vh-100" src="http://127.0.0.1:8000/images/carousel-1.jpg" alt="My Image"
                        style=" object-fit: cover;object-position: center; width: 100%;height: 100vh;">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7 text-start">
                                    <p class="fs-4 text-white animated slideInRight">Welcome to
                                        <strong>CodeAcademy</strong>
                                    </p>
                                    <h1 class="display-1 text-white mb-4 animated slideInRight">We are academy for
                                        software developers</h1>
                                    <a href=""
                                        class="btn btn-primary rounded-pill py-3 px-5 animated slideInRight">Explore
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

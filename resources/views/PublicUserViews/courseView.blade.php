@extends('layouts.app')

@section('title', 'Courses')

@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ asset('images/laptop.jpg') }}"
                        alt="Laptop" /></div>
                <div class="col-md-6">
                    <div class="small mb-1">Start date: {{ $course->start_date }}</div>
                    <h1 class="display-5 fw-bolder">{{ $course->title }}</h1>
                    <div class="fs-5 mb-5">
                        <span>
                            Modules: {{ $modulesCount }}
                            Lectures: {{ $lectureCount }}
                        </span>
                    </div>
                    <p class="lead">{{ $course->description }}</p>
                    <div class="d-flex">
                        <span>
                            End date: {{ $course->end_date }}
                        </span>
                    </div>

                </div>
            </div>
        </div>
    @endsection

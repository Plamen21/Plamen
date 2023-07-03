@extends('layouts.app')

@section('title', 'Courses')

@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">All courses</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th>Course name</th>
                                <th>Start date</th>
                                <th>End date</th>
                                <th>Estimate time</th>
                                <th>&nbsp;</th>
                                <th>More info</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!is_null($courses))
                            @foreach($courses as $course)
                                <tr class="alert" role="alert">
                                    <th scope="row">{{$course->title}}</th>
                                    <td>{{$course->start_date}}</td>
                                    <td>{{$course->end_date}}</td>
                                    <td>{{$course->estimate}}</td>
                                    <td><td><a href="{{route('course.info.user',['course_id'=>$course->id])}}"><i class="bi bi-info-circle"></i></a>&nbsp; &nbsp;Details</td></td>
                                </tr>
                            @endforeach
                            @else
                                <tr class="alert" role="alert">
                                    <th scope="row">No course yet</th>
                                    <td>No course yet</td>
                                    <td>No course yet</td>
                                    <td>No course yet</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@extends('layouts.app')

@section('title', 'My Courses')

@section('content')


    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                    class="rounded-circle" width="150">
                                <div class="mt-3">
                                    @if (!is_null($student))
                                        <h4>{{ $student->student_name }}</h4>
                                        <p class="text-secondary mb-1">Student</p>
                                        <p class="text-muted font-size-sm">{{ $student->city }} {{ $student->country }}</p>
                                    @else
                                        <p class="text-muted font-size-sm">Full your details in profile settings page</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    @if (!is_null($student))
                                        {{ $student->student_name }} {{ $student->family_name }}
                                    @else
                                        Fill your details in profile settings page
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    @if (!is_null($student))
                                        {{ $student->phone }}
                                    @else
                                        Fill your details in profile settings page
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Language level</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    @if (!is_null($student))
                                        {{ $student->language }}
                                    @else
                                        Fill your details in profile settings page
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Repository</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    @if (!is_null($student))
                                        {{ $student->repository }}
                                    @else
                                        Fill your details in profile settings page
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Overall performance</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <span>{{ $arr['overall_performance'] }}</span>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info "
                                        href="{{ route('save.student.cv', ['student_id' => $arr['student_id']]) }}"><i
                                            class="bi bi-download"></i> CV</a>
                                    <a class="btn btn-info " style="margin-left: 150px"
                                        href="{{ route('student.course.grades', ['course_id' => $arr['course_id'], 'student_id' => $arr['student_id']]) }}">Grades</a>
                                    <a class="btn btn-info " style="margin-left: 30px"
                                        href="{{ route('student.info.projects', ['course_id' => $arr['course_id'], 'student_id' => $arr['student_id']]) }}">Projects</a>
                                    <a class="btn btn-info " style="margin-left: 30px"
                                        href="{{ route('student.info.lectures', ['course_id' => $arr['course_id'], 'student_id' => $arr['student_id']]) }}">Training</a>
                                </div>
                            </div>

                        </div>
                        @if (session('error'))
                            <div class="container">
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        @endsection

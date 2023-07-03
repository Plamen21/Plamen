@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container">
            <h2 class="mb-5">Student Information</h2>
            @if(session('error'))
                <div class="alert alert-danger" id="error-message">
                    {{ session('error') }}
                </div>
                <script>
                    setTimeout(function () {
                        $('#error-message').fadeOut('slow');
                    }, 7000);
                </script>
               @php
                session()->forget('error');
                @endphp
            @endif
            <div>
                <div style="display: inline-block;margin-right: 30px">
                    <a href="{{route('client.index')}}">Back to courses</a>
                </div>
                <div style="display: inline-block;">
                    <form action="{{route('client.student.projects.info',['student_id'=>$student->id])}}" method="GET">
                        @csrf
                        <button type="submit" style=" border: 1px solid black; padding: 5px 10px;">Проекти</button>
                    </form>
                </div>
            </div>
            <div class="table-responsive custom-table-responsive">
                <table class="table custom-table">
                    <thead>
                    <tr>
                        <th scope="col">First name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Email</th>
                        <th scope="col">CV</th>
                        <th scope="col">Country</th>
                        <th scope="col">Courses</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr scope="row">
                        <td>{{$student->student_name}}</td>
                        <td>{{$student->family_name}}</td>
                        <td>{{$email}}</td>
                        <td><a href="{{route('client.download.cv',['student_id'=>$student->id])}}"><span
                                    class="bi bi-file-person" style="font-size: 30px"></span></a></td>
                        <td>
                            {{$student->country}}
                            <small class="d-block">{{$student->city}}</small>
                        </td>
                        <td>{{$coursesCount}}</td>
                    </tr>

                    </tbody>
                </table>
                <table class="table custom-table">
                    <thead>
                    <tr>
                        <th scope="col">Short Info</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr scope="row">
                        <td>{{$student->short_info}}</td>
                    </tr>
                    </tbody>
                </table>
                <table class="table custom-table">
                    <thead>
                    <tr>
                        <th scope="col">Overall performance</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr scope="row">
                        @if($student->overall_performance==null)
                            <td>No information yet</td>
                        @else
                            <td>{{$student->overall_performance}}</td>
                        @endif
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

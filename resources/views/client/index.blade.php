@extends('layouts.app')

@section('title', 'client')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Client Page</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th>Course name</th>
                            <th>Modules number</th>
                            <th>Lectures number</th>
                            <th>Get info about course participant</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($arrayOfObjects)>0)
                        @foreach($arrayOfObjects as $obj)
                            <tr class="alert" role="alert">
                                <th scope="row">{{$obj->title}}</th>
                                <td>{{$obj->modules_number}}</td>
                                <td>{{$obj->lectures_number}}</td>
                                <td><span><i class="bi bi-people"></i>&nbsp;{{$obj->students}}</span>
                                    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                    <a href="{{route('client.course.info',['course_id'=>$obj->id])}}"><i class="bi bi-info-circle"></i></a></td>
                            </tr>
                        @endforeach
                        @else
                            <article>
                                <h2>Call/text admin for making sure you allowed to see courses info.</h2>
                            </article>
                        @endif


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

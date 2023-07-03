@extends('layouts.app')

@section('title', 'My Courses')

@section('content')

    <div class="content">
        <div class="container">
            <h2 class="mb-5">Записани курсове</h2>
            <div class="table-responsive custom-table-responsive">
                <table class="table custom-table">
                    <thead>
                    <tr>
                        <th scope="col">Course name</th>
                        <th scope="col">Course start date</th>
                        <th scope="col">Course end date</th>
                        <th scope="col">For more information</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr scope="row">
                        @if(is_null($courses))
                            <td>Вие вече сте студент ,но все още нямате студентстки данни попълнете данните си в в
                                Profile settings или изчакайте администратор да го направи
                            </td>
                        @else
                            @if(count($courses)<1)
                                <td>Нямате записани курсове към днешна дата.</td>
                    @else
                        @foreach($courses as $course )
                            <tr score="row">
                                <td>{{$course->title}}</td>
                                <td>{{$course->start_date}}</td>
                                <td>{{$course->end_date}}</td>
                                <td>
                                    <a href="{{route('student.course.info',['course_id'=>$course->id,'student_id'=>$student->id])}}"><i
                                            class="bi bi-info-circle"></i></a>&nbsp; &nbsp;See short info and CV
                                </td>
                                @endforeach
                            </tr>@endif

                            @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

@endsection

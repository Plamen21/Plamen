@extends('layouts.app')

@section('title', 'Grades')
@section('content')
    <div class="container" style=" display: flex;
  justify-content: flex-end;">
        <div>
            <form action="{{ route('student.course.grades', ['course_id' => $course_id, 'student_id' => $student_id]) }}"
                method="GET">
                @csrf
                <label for="module" style="margin-right: 5px">Изберете модул:</label>
                <select name="module" id="module" style=" border: 1px solid black; padding: 5px;">
                    @foreach ($course_modules as $module)
                        <option value="{{ $module->id }}">{{ $module->module_name }}</option>
                    @endforeach
                </select>
                <button type="submit" style=" border: 1px solid black; padding: 5px 10px;margin-left: 5px">Покажи
                    резултати</button>
            </form>
        </div>
        <div class="col" style="margin-left: 150px">
            <div class="col-sm-12">

                <a class="btn btn-info"
                    href="{{ route('student.course.info', ['course_id' => $course_id, 'student_id' => $student_id]) }}">Back to
                    profile page</a>
                <a class="btn btn-info " style="margin-left: 20px"
                    href="{{ route('student.info.projects', ['course_id' => $course_id, 'student_id' => $student_id]) }}">Projects</a>
                <a class="btn btn-info " style="margin-left: 20px"
                    href="{{ route('student.info.lectures', ['course_id' => $course_id, 'student_id' => $student_id]) }}">Training</a>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">{{ $student->student_name }}-Diary</th>
                <th scope="col">Homework</th>
                <th scope="col">Absence</th>
                <th scope="col">Score</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($arrayOfObjectsPaged as $obj)
                <tr scope="row">
                    <th scope="row">{{ $obj->lecture_number }}- {{ $obj->lecture_name }}</th>
                    <td>{{ $obj->homework_status }}</td>
                    <td>{{ $obj->absence }}</td>
                    <td>{{ $obj->score }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $arrayOfObjectsPaged->links() }}
@endsection

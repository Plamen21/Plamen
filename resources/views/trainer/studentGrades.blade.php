
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/project.js') }}"></script>
<script src="{{ asset('js/modules.js') }}"></script>
<script src="{{ asset('js/lectures.js') }}"></script>
<script src="{{ asset('js/date.js') }}"></script>
<script src="{{ asset('js/absence.js') }}"></script>
<script src="{{ asset('js/homework.js') }}"></script>
<script src="{{ asset('js/grades.js') }}"></script>
@extends('partials.header')

@extends('layouts.trainer')

@section('title', 'StudentsList')

@section('content')
<form action="{{ route('save-homework') }}" id='homeworkForm' method="POST">
    @csrf
       <body>
        <div style="margin: auto; width: 75%; border: 2px solid black; padding: 10px;">
            <h5 style="text-align: left;margin-left: 10px; margin-bottom: 10px">Grades/Absences</h5>
                @include('trainer.partials.courses')
                <div style="display: flex; align-items: center; justify-content: space-between;">
                <div style="margin-right: 10px;">
                    @if ($student && $student->id >= 2)
                    <a href="{{ route('trainer.grades', ['id' => $student->id - 1]) }}">&#8592;</a>
                    @else
                    <span>&#8594;</span>
                    @endif
                </div>
                <div style="margin-right: 10px;">
                    @if ($student)
                    <span id="optionLabel">{{$student->student_name}} {{$student->family_name}}</span>
                    <input type="hidden" name="student" id="student" value="{{$student->id}}">
                    @endif
                </div>
                <div>
                   @if ($nextStudentExists && $student)
                    <a href="{{ route('trainer.grades', ['id' => $student->id + 1]) }}">&#8594;</a>
                    @else
                    <span>&#8594;</span>
                    @endif
                </div>
                <div style="text-align: right;">
                    Overall Grade: <span id="overalGrade" name='Overall Grade'></span><br>
                    Module grade: <span id="moduleGrade" name='Module grade'></span><br>
                    Lecture grade: <span id="lectureGrade"name='Lecture grade'></span><br>
                </div>
            </div>
            @include('trainer.partials.absence')
            @include('trainer.partials.homework')
            @include('trainer.partials.project')
            <br>
            <div class="text-right">
            <button type="submit" name="saveButton" id="saveButton" class="btn btn-primary">Save</button>
            </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</form>
@endif

    </body>

@endsection

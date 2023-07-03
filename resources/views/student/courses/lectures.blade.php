@extends('layouts.app')

@section('title', 'Lectures')

@section('content')
    <div class="container" style=" display: flex;
  justify-content: flex-end;">
        <div>
            <form action="{{ route('student.info.lectures', ['course_id' => $course_id, 'student_id' => $student_id]) }}"
                method="GET">
                @csrf
                <label for="module" style="margin-right: 5px">Изберете модул:</label>
                <select name="module" id="module" style=" border: 1px  black; padding: 5px;">
                    @foreach ($modules as $module)
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
                    href="{{ route('student.course.info', ['course_id' => $course_id, 'student_id' => $student_id]) }}">Back
                    to
                    profile page</a>
                <a class="btn btn-info " style="margin-left: 20px"
                    href="{{ route('student.info.projects', ['course_id' => $course_id, 'student_id' => $student_id]) }}">Projects</a>
            </div>
        </div>
    </div>
    <div class="holder d-flex align-items-center justify-content-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <div class="card rounded border-0 shadow-sm position-relative">
                        <div class="card-body p-5">
                            <div class="d-flex align-items-center mb-4 pb-4 border-bottom"><i
                                    class="far fa-calendar-alt fa-3x"></i>
                                <div class="ms-3">
                                    <h4 class="text-uppercase fw-weight-bold mb-0">{{ $day }}</h4>
                                    <p class="text-gray fst-italic mb-0">{{ $date }}</p>
                                </div>
                            </div>
                            @if ($lectures->isEmpty())
                                <div class="form-check mb-3">
                                    <label class="form-check-label" for="flexCheck1"><span class="fst-italic pl-1">No
                                            information about lectures yet</span></label>
                                </div>
                            @else
                                @foreach ($lectures as $lecture)
                                    <div class="form-check mb-3">

                                        <label class="form-check-label" for="flexCheck1">{{$lecture->lecture_number}}
                                            @if($lecture->active =='active')
                                            <span class="fst-italic pl-1">{{$lecture->lecture_name}} -<strong>Active</strong></span></label>
                                        @else
                                            <span class="fst-italic pl-1">{{$lecture->lecture_name}}</span></label>
                                            @endif
                                    </div>
                                @endforeach

                            @endif
                        {{ $lectures->links() }}
                    </div>
                    @endforeach
                    @endif
                    {{ $lectures->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

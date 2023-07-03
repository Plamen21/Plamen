@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Client Page</h2>
            </div>

            <div>
                    <a href="javascript:history.back()">Back</a>
            </div>
            <form action="{{route('client.course.module.students',['course_id'=>$course_id])}}" method="POST">
                @csrf
                <label for="modules">Повече информация за избран модул</label>
                &nbsp;
                <select id="modules" name="modules" style=" border: 1px solid black; padding: 5px;">
                    @foreach($modules as $module)
                        <option value="{{$module->module_name}}">{{$module->module_name}}</option>
                    @endforeach
                </select>
                &nbsp;
                <button type="submit" style=" border: 1px solid black; padding: 5px 10px;">Разбери повече</button>
            </form>
            @if(session('error'))
                <div class="alert alert-danger" id="error-message">
                    {{ session('error') }}
                </div>
            @endif
            <script>
                setTimeout(function(){
                    $('#error-message').fadeOut('slow');
                }, 2000);
            </script>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th>Student full name</th>
                            <th>Activity</th>
                            <th>Overall Performance</th>
                            <th>Final Score</th>
                            <th>Language level</th>
                            <th>More info about student</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($arrOfStudentsObj as $student)
                            <tr class="alert" role="alert">
                                <th scope="row">{{$student->name}} {{$student->family_name}}</th>
                                <td>{{$student->activity}} %</td>
                                <td>{{$student->overall_performance}}</td>
                                <td>{{$student->final_score}}</td>
                                <td>{{$student->language}}</td>
                                <td><a href="{{route('client.student.info',['student_id'=>$student->id])}}"><i class="bi bi-info-circle"></i></a>&nbsp; &nbsp;See short info and CV</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

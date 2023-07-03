@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Client Page</h2>
            </div>
            <div>
                <h3 class="heading-section">{{$module->module_name}}</h3>
            </div>
            <div>
                <a href="javascript:history.back()">Back</a>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th>Student full name</th>
                            <th>Activity</th>
                            <th>Final Score</th>
                            <th>More info about student</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($arrayOfStudentsObj as $student)
                            <tr class="alert" role="alert">
                                <th scope="row">{{$student->first_name}} {{$student->family_name}}</th>
                                <td>{{$student->activity}} %</td>
                                <td>{{$student->final_score}}</td>
                                <td><a href="{{route('client.student.info',['student_id'=>$student->id])}}"><i class="bi bi-info-circle"></i></a>&nbsp;See short info and CV</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection


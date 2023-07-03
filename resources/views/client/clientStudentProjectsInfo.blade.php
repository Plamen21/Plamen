@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container">
        <h2 class="mb-5">Student Information</h2>
        <div>
            <a href="javascript:history.back()">Back</a>
        </div>
        <div class="table-responsive custom-table-responsive">
            <table class="table custom-table">
                <thead>
                <tr>
                    <th scope="col">Project name</th>
                    <th scope="col">Course name</th>
                    <th scope="col">Module name</th>
                    <th scope="col">Project score</th>
                </tr>
                </thead>
                <tbody>
                <tr scope="row">
                    @if($projects==null)
                    <td>No information yet</td>
                    @else
                    @foreach($projects as $project)
                <tr score="row">
                    <td>{{$project->project_name}}</td>
                    <td>{{$project->course_name}}</td>
                    <td>{{$project->module_name}}</td>
                    <td>{{$project->project_score}}</td>
                    @endforeach
                </tr>
                @endif
                </tbody>
            </table>
    </div>
</div>
@endsection


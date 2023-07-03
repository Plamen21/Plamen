@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <div class="content">
        <div class="container">
            <h2 class="mb-5">Projects</h2>
            <div style="margin-bottom: 10px">
                <a class="btn btn-info" href="javascript:history.back()">Back</a>
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
                            @if (count($arrOfObj) < 1)
                                <td>No information yet</td>
                            @else
                                @foreach ($arrOfObj as $project)
                        <tr score="row">
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->course_name }}</td>
                            <td>{{ $project->module_name }}</td>
                            <td>{{ $project->score }}</td>
                            @endforeach
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    @endsection

@extends('partials.header')

@extends('layouts.trainer')

@section('title', 'StudentsList')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="pull-left">
                        <form action="{{ route('trainer.chooseStudent') }}" method="get">
                            @csrf
                            @method('get')
                            <input type="hidden" name="id" value="">
                            <button type="submit" class="btn btn-success" id="addRowBtn">New</button>
                        </form>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Student
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Info</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Edit</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Grades</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Delete</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($students as $student)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $student->student_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap"></td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="row">
                                            <div class="col-lg-12 margin-tb">
                                                <div class="pull-left">
                                                    <form action="{{ route('trainer.studentForm', $student->id) }}"
                                                        method="GET">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $student->id }}">
                                                        <button type="submit" class=" btn btn-primary">Edit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="row">
                                            <div class="col-lg-12 margin-tb">
                                                <div class="pull-left">
                                                    <form action="{{ route('trainer.grades', $student->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $student->id }}">
                                                        <button type="submit" class=" btn btn-info">Grades</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('trainer.destroy', $student->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

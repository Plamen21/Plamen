@extends('admin.index')

@section('title', 'EditTraining')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.training.update', $course->id) }}" method="POST">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="pull-left">
                            <h2>Edit Course</h2><br />
                        </div>
                        <div class="form-group">
                            <table class="min-w-full divide-y divide-gray-200 table-auto">
                                <thead class="bg-gray-50 min-w-full divide-y">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Title Course
                                        </th>

                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            start_date</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            End_date</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            estimate</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <input type="text" name="title" class="form-control"
                                                placeholder="Enter title" value="{{ $course->title }}">
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <input type="date" name="start_date" class="form-control"
                                                placeholder="Enter start date" value="{{ $course->start_date }}">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <input type="date" name="end_date" class="form-control"
                                                placeholder="Enter end date" value="{{ $course->end_date }}">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <input type="text" name="estimate" class="form-control"
                                                placeholder="Enter estimate" value="{{ $course->estimate }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            description</th>
                                        <td class="px-6 py-4 whitespace-wrap">
                                            <div class="w-full">
                                                <textarea name="description" class="form-control" placeholder="" value="">{{ $course->description }}</textarea>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <input type="hidden" value="{{ $course->id }}" style='display: none'>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-primary" href="{{ route('admin.training.index') }}"> Back</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 margin-tb">


                            <div class="pull-right">

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

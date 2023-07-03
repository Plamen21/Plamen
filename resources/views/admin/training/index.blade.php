@extends('admin.index')

@section('title', 'Training')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <form action="{{ route('admin.training.create') }}" method="GET">
                                    @csrf
                                    @method('GET')
                                    <input type="hidden" name="id" value="1">
                                    <button type="submit" class="btn btn-success" id="addRowBtn">New</button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200 table-fixed">

                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Title
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Start_date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    End_date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Edit</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Delete</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($courses as $course)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $course->title }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $course->start_date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $course->end_date }}</td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="row">
                                            <div class="col-lg-12 margin-tb">
                                                <div class="pull-left">
                                                    <form action="{{ route('admin.training.edit', $course->id) }}"
                                                        method="GET">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $course->id }}">
                                                        <button type="submit" class=" btn btn-primary">Edit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('admin.training.destroy', $course->id) }}" method="POST">
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

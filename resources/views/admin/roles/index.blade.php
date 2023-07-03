@extends('admin.index')

@section('title', 'Roles')

@section('content')
    <div class="py-12 d-flex justify-content-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200" style="margin-left:50%s">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Role</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Edit</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Delete</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $key + 1 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->username }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->role->role }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="row">
                                            <div class="col-lg-12 margin-tb">
                                                <div class="pull-left">
                                                    <form action="{{ route('admin.roles.edit', $user->id) }}"
                                                        method="GET">
                                                        @csrf
                                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                        <button type="submit" class="btn btn-primary">Edit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('admin.roles.destroy', $user->id) }}" method="POST">
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

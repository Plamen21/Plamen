@extends('partials.header')

@extends('layouts.trainer')

@section('title', 'ChooseStudent')

@section('content')
    <div class="py-12">
        <div class="max-w-md mx-auto p-6 bg-white border-b border-gray-200">
            <form action="{{ route('trainer.addStudent') }} " method="post">
                @csrf
                <div class="flex justify-center items-center mb-6">
                    <h2 class="text-xl font-semibold mr-4">Add Student</h2>
                </div>
                <div class="flex items-center">
                    <i class="bi bi-person-fill text-6xl mr-4"></i>
                    <div class="flex-grow">
                        <select name="id" class="form-control">
                            @foreach ($user as $user)
                                <option value="{{ $user->id }}">{{ $user->username }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary ml-4">Save</button>
                </div>
            </form>
        </div>
    </div>

@endsection

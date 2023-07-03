@extends('partials.header')

@extends('layouts.trainer')

@section('title', 'ChooseCourse')

@section('content')
    <div class="py-12">
        <div class="max-w-3xl mx-auto p-6 bg-white border-b border-gray-200" style="max-width: 50%;">
            <form action="{{ route('trainer.editCourse') }}" method="get"
                style="display: flex; align-items: center; justify-content: space-between;">
                @csrf
                <div class="form-group">
                    <strong>Course:</strong>
                    <select name="id" class="form-control" style="width: 100%;">
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div style="display: flex; align-items: center;">
                    <input type="hidden" value="{{ $course->id }}">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection

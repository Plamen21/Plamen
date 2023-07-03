@extends('partials.header')

@extends('layouts.trainer')

@section('title', 'EditModule')

@section('content')
    <div class="py-12">
        <div class="max-w-3xl mx-auto p-6 bg-white border-b border-gray-200" style="max-width: 50%;">
            <form action="{{ route('trainer.chooseCourseModule', ['id' => $courses->id]) }}" method="post"
                style="display: flex; align-items: center; justify-content: space-between;">
                @csrf
                <div class="form-group">
                    <strong></strong>
                    <select name="module_id" class="form-control" style="width: 100%;">
                        @foreach ($modules as $module)
                            <option value="{{ $module->id }}">{{ $module->module_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div style="display: flex; align-items: center;">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection

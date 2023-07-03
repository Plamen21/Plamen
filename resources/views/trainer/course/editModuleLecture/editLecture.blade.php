@extends('partials.header')

@extends('layouts.trainer')

@section('title', 'EditLectures')

@section('content')
    <div class="py-12">
        <div class="max-w-3xl mx-auto p-6 bg-white border-b border-gray-200" style="max-width: 50%;">
            <form
                action="{{ route('trainer.chooseModuleLecture', ['id' => $courses->id, 'module_id' => $modules->first()->id]) }}"
                method="post" style="display: flex; align-items: center; justify-content: space-between;">
                @csrf
                <div class="form-group">
                    <strong>Lecture:</strong>
                    <select name="lecture_id" class="form-control" style="width: 100%;">
                        @foreach ($lectures as $lecture)
                            <option value="{{ $lecture->id }}">{{ $lecture->lecture_name }}</option>
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

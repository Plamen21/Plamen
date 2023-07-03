@extends('layouts.admin')

@section('title', 'Admin')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex w-full bg-slate-50">

                    @yield('content')
                </div>
            </div>
        </div>
    </div>
@endsection

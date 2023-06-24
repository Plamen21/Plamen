@extends('layouts.publicUserNavigation')

@section('content')
    <style> .center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 10px;
        }
    </style>
    <div class=".center">

        <h1 style="text-align: center">Course name: {{$title}} </h1>
        <p style="text-align: center;padding: 40px">
            <b>Course description:</b>
            {{$description}}
        </p>
    </div>
@endsection

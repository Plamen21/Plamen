@extends('layout.head')

@section('title', 'HTML')

@section('content')
    @foreach ($result as $v)
        Name is {{ $v->NAME }} and age are: {{ $v->AGE }} .SALARY is {{ $v->SALARY }} and ADDRESS are:
        {{ $v->ADDRESS }}<br>
    @endforeach

@endsection

@extends('layout.footer')

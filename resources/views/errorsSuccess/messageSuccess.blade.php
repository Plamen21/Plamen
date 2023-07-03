@extends('layouts.app')
@section('content')
@if(session('success'))
    <div class="alert alert-success" id="success-message">
        {{ session('success') }}
    </div>
@endif
<script>
    setTimeout(function(){
        $('#success-message').fadeOut('slow', function() {
            window.location.href = '/';
        });
    }, 2000);
</script>
@endsection

@extends('admin.index')

@section('title', 'EditRoles')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.roles.update', $user_id) }}" method="POST">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="pull-left">
                            <h2>Edit Role Student</h2>
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            <select name="role" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="trainer">Trainer</option>
                                <option value="student">Student</option>
                                <option value="client">Client</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <input type="text" value="{{ $user_id }}" style='display: none'>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-primary" href="{{ route('admin.roles.index') }}"> Back</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 margin-tb">


                            <div class="pull-right">

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('partials.header')

@extends('layouts.trainer')

@section('title', 'AddStudent')

@section('content')

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

    <form style="width: 80%" action="{{ route('trainer.store') }}" method="Post">
        @csrf
        <div style="
    margin: auto;
    width: 100%; 
      border: 2px solid black;
     padding: 10px;">
            <h1>Add</h1>

            <div style="text-align: right">
                <i class="bi bi-person-fill pull-right" style="font-size: 100px;"></i>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    Name
                    <input type="text" style="border:2px solid black" class="form-control" id="studentName"
                        placeholder="" name="student_name" value="">
                </div>
                <div class="form-group col-md-6">Family
                    <input type="text" style="border:2px solid black" class="form-control" id="studentFamilyName"
                        placeholder="" name="family_name" value="">
                </div>
            </div>Email
            <div class="form-group" style="border:2px solid black">
                <input type="text" class="form-control" id="studentEmail" placeholder="{{ $user->email }}"
                    name="{{ $user->email }}" value="{{ $user->email }}">
            </div>Phone
            <div class="form-group" style="border:2px solid black">
                <input type="text" class="form-control" id="studentPhone" placeholder="" name="phone">
            </div>
            <br>Country
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" style="border:2px solid black" id="studentCountry"
                        placeholder="" name="country">
                </div><br>
                <br>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="studentCity" style="border:2px solid black"
                        placeholder="" name="city">
                </div>
            </div>
            <br>Language
            <div class="form-group" style="border:2px solid black">
                <input type="text" class="form-control" id="language" placeholder="" name="language">
            </div>


            <div class="row">
                <form class="form-inline">
                    <fieldset>

                        <input type="text" style="border:2px solid black;
                    height:40px"
                            id="languageLevel" size="99" placeholder="Language level / score" name="language">
                        <span class="bi bi-plus" style="font-size: 30px;"></span>

                    </fieldset>
                </form>
            </div>
            <div class="row">
                <form class="form-inline">
                    <fieldset>
                        <input type="text" style="border:2px solid black;
                        height:40px"
                            id="languageLevel" size="99" value="" name="repository" placeholder="Repository">
                        <span class="bi bi-plus" style="font-size: 30px;"></span>
                    </fieldset>
                </form>
            </div>


            <div class="row">
                <div class="col-sm-10">Short Info
                    <textarea class="form-control" id="lectureDescription" rows="5" placeholder="" name="short_info"
                        style="margin-top: 10px;width: 800px;border:2px solid black"></textarea>
                </div>
            </div>


            <div class="form-row" style="margin-top: 10px">
                <div class="form-group col-md-6">
                    <a href="" id="fileUpload"> <input id="upload-file" type="file" style="display:none;" />add
                        details</a>
                </div>
                <input type="hidden" value="{{ $user->id }}" name="id">
                <button type="submit" class="btn btn-primary" style="right: 33%; position: absolute"> Save</button>
            </div>
        </div>
    </form>
@endsection

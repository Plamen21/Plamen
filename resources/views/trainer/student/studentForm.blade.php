@extends('partials.header')

@extends('layouts.trainer')

@section('title', 'StudentForm')

@section('content')
    <form style="width: 80%" METHOD="POST" action="{{ route('trainer.update', $student->id) }}">
        @csrf
        <div style="
        margin: auto;
        width: 100%;
          border: 2px solid black;
         padding: 10px;">
            <h1>Add/Edit user</h1>
            <div style="text-align: right">
                <i class="bi bi-person-fill pull-right" style="font-size: 100px;"></i>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" style="border:2px solid black" class="form-control" id="studentName"
                        value="{{ $student->student_name }}" name="student_name">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" style="border:2px solid black" class="form-control" id="studentFamilyName"
                        name="family_name" value="{{ $student->family_name }}">
                </div>
            </div>
            <div class="form-group" style="border:2px solid black">
                <input type="text" class="form-control" id="studentEmail" placeholder="email" name="student_email"
                    value="{{ $user->email }}">
            </div>
            <div class="form-group" style="border:2px solid black">
                <input type="text" class="form-control" id="studentPhone" name="phone" value="{{ $student->phone }}">
            </div>
            <br>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="country" style="border:2px solid black"
                        id="studentCountry" value="{{ $student->country }}">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="studentCity" name='city'
                        style="border:2px solid black" value="{{ $student->city }}">
                </div>
            </div>
            <br>
            <div class="form-group" style="border:2px solid black">
                <article type="text" style="text-align: center" class="form-control" id="language">Language level
                </article>
            </div>
            <div class="row">
                <form class="form-inline">
                    <fieldset>

                        <input type="text" style="border:2px solid black;
                        height:40px"
                            id="languageLevel" size="99" placeholder="Language level / score" name="language"
                            value="{{ $student->language }}">
                        <span class="bi bi-plus" style="font-size: 30px;"></span>

                    </fieldset>
                </form>
            </div>
            <div class="row">
                <form class="form-inline">
                    <fieldset>
                        <input type="text" size="99" style="border:2px solid black;height: 40px" name="repository"
                            value="{{ $student->repository }}">
                        <input type="text" style="border:2px solid black;
                        height:40px"
                            id="languageLevel" size="99" placeholder="Repository" value="{{ $student->repository }}"
                            name="repository">
                    </fieldset>
                </form>
            </div>
            <div class="row">
                <div class="col-sm-10">
                    <textarea class="form-control" id="lectureDescription" rows="5" name="short_info"
                        style="margin-top: 10px;width: 800px;border:2px solid black">{{ $student->short_info }}</textarea>
                </div>
            </div>
            <div class="form-row" style="margin-top: 10px">
                <div class="form-group col-md-6">
                    <a href="" id="fileUpload"> <input id="upload-file" type="file" style="display:none;" />add
                        cv</a>
                </div>
                <input type="hidden" value="{{ $student->id }}" style='display: none'>
                <button type="submit" class="btn btn-primary" style="right: 33%; position: absolute"> Save</button>
            </div>
        </div>
    </form>
@endsection

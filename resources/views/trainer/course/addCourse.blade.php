@extends('partials.header')

@extends('layouts.trainer')

@section('title', 'AddCourse')

@section('content')
    <h1 style="text-align: left;margin-left: 170px">Add Training Synopsis</h1>
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

    <form style="width:100%;" action="{{ route('trainer.storeCourse') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="
        margin: auto;
        width: 75%;
          border: 2px solid black;
         padding: 10px;">
            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lectureTitle" style="border:2px solid black; "
                        placeholder="Training title" name="title">
                    <textarea class="form-control" id="lectureDescription" rows="3" style="border:2px solid black;margin-top: 10px"
                        placeholder="Description" name="description"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                    <label for="moduleTitle"><i class="bi bi-plus" style="font-size: 25px"></i> Add module</label>
                    <input type="text" class="form-control" id="moduleTitle" style="border:2px solid black"
                        name="module_name" placeholder="Module title">
                    <textarea class="form-control" id="moduleDescription" rows="3" style="border:2px solid black;margin-top: 10px"
                        name="" placeholder="Description"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                    <label for="lectureTitle"><i class="bi bi-plus" style="font-size: 25px"></i> Add lecture</label>
                    <input type="text" class="form-control" id="lectureTitle" style="border:2px solid black"
                        name="lecture_name" placeholder="Lecture title">
                    <textarea class="form-control" id="lectureDescription" rows="3" style="border:2px solid black;margin-top: 10px "
                        placeholder="Description"></textarea>
                </div>
            </div>

            <h2>Schedule</h2>
            <div class="row">
                <form class="form-inline">
                    <fieldset>
                        <label class="control-label" style="margin-right: 10px"><strong>From/To date </strong></label>
                        <input type="date" class="input-mini" style="border:2px solid black" id="fromDate"
                            name="start_date">
                        <span class="bi bi-calendar" style="font-size: 30px;margin-left: 5px"></span>
                        <label class="control-label" style="margin-left: 10px;margin-right: 10px"></label>
                        <input type="date" class="input-mini" style="border:2px solid black" id="toDate"
                            name="end_date">
                        <span class="bi bi-calendar" style="font-size: 30px;margin-left: 5px;"></span>
                    </fieldset>
                </form>
            </div>

            <div class="row" style="margin-top: 10px">
                <form class="form-inline">
                    <fieldset>
                        <label for="hours"> Estimate
                            &nbsp &nbsp &nbsp &nbsp <input id="hours" name="estimate" type="text"
                                style="border:2px solid black"required>
                            &nbsp &nbsp &nbsp &nbsp
                            <span> hours</span>
                        </label>
                    </fieldset>
                </form>
            </div>

            <div class="form-group row" style="margin-top: 10px">
                <div class="col-sm-10">
                    <label for="exampleFormControlTextarea1"><i class="bi bi-plus" style="font-size: 25px"></i> Add
                        homework</label>
                    <textarea class="form-control" id="homeworkDescription" style="border:2px solid black" rows="3"
                        placeholder="Task description"></textarea>
                </div>
            </div>

            <a href="#" id="fileUpload">Add photo</a>
            <input id="upload-file" type="file" style="display:none" name="lecture_photo" />
            <span id="file-name"></span>
            <div class="form-group row" style="text-align: right">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </form>

@endsection

@extends('partials.header')

@extends('layouts.trainer')

@section('title', 'EditCourse')

@section('content')
    <h1 style="text-align: left;margin-left: 170px">Edit Training Synopsis</h1>
    <form style="width:100%;" method="POST"
        action="{{ route('trainer.updateCourse', [
            'id' => $courses->id,
            // 'module_id' => $modules->first()->id,
            // 'lecture_id' => $lectures->first()->id,
        ]) }} ">
        @csrf
        <div style="
        margin: auto; width: 75%; border: 2px solid black; padding: 10px;">
            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lectureTitle" style="border:2px solid black; "
                        placeholder="Training title" value="{{ $courses->title }}" name="title"><i class="bi bi-plus"
                        style="font-size: 25px"></i>
                    <a href="{{ route('trainer.chooseCourse') }}">Add
                        Course </a>
                    <textarea class="form-control" id="lectureDescription" rows="3" style="border:2px solid black;margin-top: 10px"
                        placeholder="description" name="description" value="">{{ $courses->description }}  </textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <label for="moduleTitle"><i class="bi bi-plus" style="font-size: 25px"></i> <a
                            href="{{ route('trainer.addModule', ['id' => $courses->id]) }}">Add module</a></label>

                    @isset($modules)
                        <input type="text" class="form-control" id="moduleTitle" style="border:2px solid black"
                            placeholder="Module title" value="" name="module_name">
                    @else
                        <input type="text" class="form-control" id="moduleTitle" style="border:2px solid black"
                            placeholder="Module title" name="module_name" value="">
                    @endisset

                    <textarea class="form-control" id="moduleDescription" rows="3" style="border:2px solid black;margin-top: 10px"
                        placeholder="Description" value=""></textarea>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                    <label for="lectureTitle">
                        <i class="bi bi-plus" style="font-size: 25px"></i>
                        @isset($modules)
                            <a
                                href="{{ route('trainer.addLecture', ['id' => $courses->id, 'module_id' => $modules->first()->id]) }}">Add
                                lecture</a>
                        @else
                            <span>Add lecture</span>
                        @endisset
                    </label>
                    @isset($lectures)
                        <input type="text" class="form-control" id="lectureTitle" style="border:2px solid black"
                            placeholder="Lecture title" name="lecture_name" value="{{ $lectures->lecture_name }}">
                    @else
                        <input type="text" class="form-control" id="lectureTitle" style="border:2px solid black"
                            placeholder="Lecture title" name="" value="">
                    @endisset

                    <textarea class="form-control" id="lectureDescription" rows="3" style="border:2px solid black;margin-top: 10px"
                        placeholder="Description"></textarea>
                </div>
                <h2>Schedule</h2>
                <div class="row">
                    <form class="form-inline">
                        <fieldset>
                            <label class="control-label" style="margin-right: 10px"><strong>From/To date </strong></label>
                            <input type="date" class="input-mini" style="border:2px solid black" id="fromDate"
                                name="start_date" value="{{ $courses->start_date }}">
                            <span class="bi bi-calendar" style="font-size: 30px;margin-left: 5px"></span>
                            <label class="control-label" style="margin-left: 10px;margin-right: 10px"></label>
                            <input type="date" class="input-mini" style="border:2px solid black" id="toDate"
                                name="end_date" value="{{ $courses->end_date }}">
                            <span class="bi bi-calendar" style="font-size: 30px;margin-left: 5px;"></span>
                        </fieldset>
                    </form>
                </div>

                <div class="row" style="margin-top: 10px">
                    <form class="form-inline">
                        <fieldset>
                            <label for="hours"> Estimate
                                &nbsp &nbsp &nbsp &nbsp <input id="hours" type="text"
                                    style="border:2px solid black" name="estimate" value="{{ $courses->estimate }}">
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
        </div>
    </form>
@endsection

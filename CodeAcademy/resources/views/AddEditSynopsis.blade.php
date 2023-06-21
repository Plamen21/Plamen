
@extends('layouts.app')

@section('content')
    <h1 style="text-align: left;margin-left: 170px">Add/Edit training synopsis</h1>
    <form style="width:100%;">
        <div style="
        margin: auto;
        width: 75%;
          border: 2px solid black;
         padding: 10px;">
        <div class="form-group row">
            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lectureTitle" style="border:2px solid black; " placeholder="Training title ">
                    <textarea class="form-control" id="lectureDescription" rows="3" style="border:2px solid black;margin-top: 10px" placeholder="Description"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                    <label for="moduleTitle"><i class="bi bi-plus" style="font-size: 25px" ></i> Add module</label>
                    <input type="text" class="form-control" id="moduleTitle" style="border:2px solid black" placeholder="Module title">
                    <textarea class="form-control" id="moduleDescription" rows="3" style="border:2px solid black;margin-top: 10px" placeholder="Description"></textarea>
                </div>
            </div>
            </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <label for="lectureTitle"><i class="bi bi-plus"  style="font-size: 25px"></i> Add lecture</label>
                <input type="text" class="form-control" id="lectureTitle"  style="border:2px solid black" placeholder="Lecture title">
                <textarea class="form-control" id="lectureDescription" rows="3" style="border:2px solid black;margin-top: 10px " placeholder="Description"></textarea>
            </div>
        </div>
                <h2>Schedule</h2>
            <div class="row">
                <form class="form-inline">
                    <fieldset>
                        <label class="control-label" style="margin-right: 10px"><strong>From/To date  </strong></label>
                        <input type="date" class="input-mini" style="border:2px solid black" id="fromDate">
                        <span class="bi bi-calendar" style="font-size: 30px;
                        margin-left: 5px"></span>
                        <label class="control-label" style="margin-left: 10px;margin-right: 10px"></label>
                        <input type="date" class="input-mini" style="border:2px solid black" id="toDate" >
                        <span class="bi bi-calendar" style="font-size: 30px;margin-left: 5px;"></span>

                    </fieldset>
                </form>
            </div>
                <div class="row" style="margin-top: 10px">
                <form  class="form-inline">
                    <fieldset>
                        <label for="hours"> Estimate
                            &nbsp &nbsp &nbsp &nbsp <input id="hours" type="text" style="border:2px solid black">
                            &nbsp &nbsp &nbsp &nbsp
                            <span> hours</span>
                        </label>
                    </fieldset>
                </form>
                </div>
                <div class="form-group row" style="margin-top: 10px">
                    <div class="col-sm-10">
                        <label for="exampleFormControlTextarea1"><i class="bi bi-plus"  style="font-size: 25px"></i> Add homework</label>
                        <textarea class="form-control" id="homeworkDescription" style="border:2px solid black" rows="3" placeholder="Task description"></textarea>
                    </div>
                </div>

            <a href="" id="fileUpload">  <input id="upload-file" type="file" style="display:none" />Upload your photo</a>

        <div class="form-group row" style="text-align: right">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary"> Save</button>
            </div>
        </div>
        </div>

    </form>

@endsection






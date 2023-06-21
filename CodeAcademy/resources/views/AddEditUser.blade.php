@extends('layouts.app')

@section('content')

    <form style="width: 80%">

        <div style="
        margin: auto;
        width: 75%;
          border: 2px solid black;
         padding: 10px;">
            <h1>Add/Edit user</h1>
            <div style="text-align: right">
            <i class="bi bi-person-fill pull-right" style="font-size: 100px;"></i>
            </div>
        <div class="form-row">
            <div class="form-group col-md-6" >
                <input type="text" style="border:2px solid black" class="form-control" id="studentName" placeholder="Student name">
            </div>
            <div class="form-group col-md-6" >
                <input type="text"  style="border:2px solid black" class="form-control" id="studentFamilyName" placeholder="Family">
            </div>
        </div>
            <div class="form-group" style="border:2px solid black">
                <input type="text" class="form-control" id="studentEmail" placeholder="email">
            </div>
            <div class="form-group" style="border:2px solid black">
                <input type="text" class="form-control" id="studentPhone" placeholder="phone">
            </div>
            <br>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" style="border:2px solid black" id="studentCountry" placeholder="Country">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="studentCity" style="border:2px solid black" placeholder="City">
                </div>
            </div>
            <br>
            <div class="form-group" style="border:2px solid black">
                <input type="text" class="form-control" id="language" placeholder="Language">
            </div>


            <div class="row">
                <form class="form-inline">
                    <fieldset >

                        <input type="text"  style="border:2px solid black;
                        height:40px"  id="languageLevel" size="99" placeholder="Language level / score">
                        <span class="bi bi-plus" style="font-size: 30px;"></span>

                    </fieldset>
                </form>
            </div>
            <div class="row">
                <form class="form-inline">
                    <fieldset >

                        <input type="text"  style="border:2px solid black;
                        height:40px"  id="languageLevel" size="99" placeholder="Repository">
                        <span class="bi bi-plus" style="font-size: 30px;"></span>
                    </fieldset>
                </form>
            </div>


            <div class="row">
                <div class="col-sm-10">
                <textarea class="form-control" id="lectureDescription" rows="5" placeholder="Short info" style="margin-top: 10px;width: 800px;border:2px solid black"></textarea>
                </div>
            </div>


            <div class="form-row" style="margin-top: 10px">
                <div class="form-group col-md-6"  >
                    <a href="" id="fileUpload">  <input id="upload-file" type="file" style="display:none;" />add details</a>
                </div>
                    <button type="submit" class="btn btn-primary" style="right: 33%; position: absolute"> Save</button>
            </div>


        </div>
    </form>
@endsection

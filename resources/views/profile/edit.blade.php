@extends('layouts.app')

@section('title', 'EditProfile')

@section('content')
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><i
                        class="bi bi-person-fill pull-right" style="font-size: 100px;"></i><span
                        class="font-weight-bold">{{ $user->username }}</span><span
                        class="text-black-50">{{ $user->email }}</span><span> </span></div>
            </div>
            <div class="col-md-9">
                <form method="POST" action="{{ route('user.profile.save') }}">
                    @csrf
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center experience"><span>Edit User
                                details</span><span class="border px-3 p-1 add-experience"><i
                                    class="fa fa-plus"></i>&nbsp;User details</span></div><br>
                        <div class="col-md-12" id="web_pageCon"><label class="labels">Web page/ s</label> <a
                                class="bi bi-plus" style="font-size: 25px;"
                                onclick="addInputFields('web_pageCon','web_pages')"></a>
                            @if (count($user_webPages) == 1)
                                <input type="text" name="web_pages[]" class="form-control" placeholder="Https:/ "
                                    value="{{ $user_webPages[0] }}">
                            @elseif(count($user_webPages) > 1)
                                @foreach ($user_webPages as $page)
                                    <input type="text" name="web_pages[]" class="form-control" placeholder="Https:/ "
                                        value="{{ $page }}">
                                @endforeach
                            @else
                                <input type="text" name="web_pages[]" class="form-control" placeholder="Https:/ "
                                    value="">
                            @endif
                            @error('web_pages')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> <br>
                        <div id="msg_namesCon" class="col-md-12"><label class="labels">Messenger name/ s</label><a
                                class="bi bi-plus" style="font-size: 25px;"
                                onclick="addInputFields('msg_namesCon','msg_names')"></a>
                            @if (count($user_MsgNames) == 1)
                                <input type="text" name="msg_names[]" class="form-control"
                                    placeholder="type messenger name" value="{{ $user_MsgNames[0] }}">
                            @elseif(count($user_MsgNames) > 1)
                                @foreach ($user_MsgNames as $msg)
                                    <input type="text" name="msg_names[]" class="form-control"
                                        placeholder="type messenger name" value="{{ $msg }}">
                                @endforeach
                            @else
                                <input type="text" name="msg_names[]" class="form-control"
                                    placeholder="type messenger name" value="">
                            @endif
                            @error('msg_names')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div id="hobbiesCon" class="col-md-12"><label class="labels">Hobbies / activities</label><a
                                class="bi bi-plus" style="font-size: 25px;"
                                onclick="addInputFields('hobbiesCon','hobbies')"></a>
                            @if (count($user_hobbies) == 1)
                                <input type="text" name="hobbies[]" class="form-control"
                                    placeholder="type hobbies or activities" value="{{ $user_hobbies[0] }}">
                            @elseif(count($user_hobbies) > 1)
                                @foreach ($user_hobbies as $hobby)
                                    <input type="text" name="hobbies[]" class="form-control"
                                        placeholder="type hobbies or activities" value="{{ $hobby }}">
                                @endforeach
                            @else
                                <input type="text" name="hobbies[]" class="form-control"
                                    placeholder="type hobbies or activities" value="">
                            @endif
                            @error('hobbies')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div id="skillCon" class="col-md-12"><label class="labels">Skills</label><a class="bi bi-plus"
                                style="font-size: 25px;" onclick="addInputFields('skillCon','skills')"></a>
                            @if (count($user_skills) == 1)
                                <input type="text" name="skills[]"class="form-control" placeholder="type skills"
                                    value="{{ $user_skills[0] }}">
                            @elseif(count($user_skills) > 1)
                                @foreach ($user_skills as $skill)
                                    <input type="text" name="skills[]"class="form-control" placeholder="type skills"
                                        value="{{ $skill }}">
                                @endforeach
                            @else
                                <input type="text" name="skills[]"class="form-control" placeholder="type skills"
                                    value="">
                            @endif
                            @error('skills')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save
                                Profile</button></div>
                    </div>
                </form>
            </div>
        @endsection

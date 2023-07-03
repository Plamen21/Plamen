<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $user=User::find($user_id);
        $details = UserDetails::where('user_id', $user_id)->get();
        $user_webPages = [];
        $user_MsgNames = [];
        $user_hobbies = [];
        $user_skills = [];

        if (count($details) > 0) {
            foreach ($details as $detail) {
                if ($detail->type == 'web_page') {
                    $user_webPages[] = $detail->value;
                }
                if ($detail->type == 'messenger_name') {
                    $user_MsgNames[] = $detail->value;
                }
                if ($detail->type == 'hobby') {
                    $user_hobbies[] = $detail->value;
                }
                if ($detail->type == 'skill') {
                    $user_skills[] = $detail->value;
                }
            }

        }
        return view('profile.edit', compact('user_webPages', 'user_MsgNames', 'user_hobbies', 'user_skills','user'));


    }

    public function update(Request $request)
    {
        $userId = Auth::user()->id;
        $details = UserDetails::where('user_id', $userId)->get();
        $webPages = $request->input('web_pages');
        $user_MsgNames = $request->input('msg_names');
        $user_hobbies = $request->input('hobbies');
        $user_skills = $request->input('skills');
        if (count($details) > 0) {
            foreach ($details as $detail) {
                $detail->delete();
            }
        }
            if (!is_null($webPages)) {
                foreach ($webPages as $key => $value) {
                    if (!is_null($value)) {
                        $new_page = new UserDetails();
                        $new_page->type = 'web_page';
                        $new_page->value = $value;
                        $new_page->user_id = $userId;
                        $new_page->save();
                    }
                }
            }

            if(!is_null($user_MsgNames)){
            foreach ($user_MsgNames as $key => $value) {
                if(!is_null($value)) {
                    $msgName = new UserDetails();
                    $msgName->type = 'messenger_name';
                    $msgName->value = $value;
                    $msgName->user_id = $userId;
                    $msgName->save();
                }
        }}
            if(!is_null($user_hobbies)) {
                foreach ($user_hobbies as $key => $value) {
                    if (!is_null($value)) {
                        $activity = new UserDetails();
                        $activity->type = 'hobby';
                        $activity->value = $value;
                        $activity->user_id = $userId;
                        $activity->save();
                    }
                }
            }
        if (!is_null($user_skills)) {
            foreach ($user_skills as $key => $value) {
                if(!is_null($value)) {
                    $new_skill = new UserDetails();
                    $new_skill->type = 'skill';
                    $new_skill->value = $value;
                    $new_skill->user_id = $userId;
                    $new_skill->save();
                }
            }
        }


        return redirect()->to('/')->with('success', 'Profile settings was saved.');
        //TODO implement succes page
    }
    }

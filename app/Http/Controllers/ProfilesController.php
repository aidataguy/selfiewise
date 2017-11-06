<?php

namespace App\Http\Controllers;


use Auth;
use Alert;
use Session;
use App\User;
use Illuminate\Http\Request;
use Storage;

class ProfilesController extends Controller
{
    //
    public function index($slug)
    {
    	$user = User::where('slug', $slug)->first();
    	return view('profiles.profile')
    		->with('user', $user);

    }
     public function edit()
    {
    	return view('profiles.edit')->with('info', Auth::User()->profile);
    }
     public function update(Request $r)
    {

    	$this->validate($r, [
    		'location' => 'required',
    		'about' => 'required|max:255'
    	]);

    	Auth::user()->profile()->update([
    		'location' => $r->location,
    		'about' => $r->about

    	]);

        if($r->hasFile('avatar'))
        {
            Auth::user()->update([

                'avatar' => Storage::putFile('public/avatars', $r->file('avatar'))


                // $r->avatar->store('public/avatars')
            ]);
        }
    	Alert::message('Profile Updated');
    	return redirect()->back();
    }

}

<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Alert;
use Session;
use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    //
    public function index($slug)
    {
        $uid = Auth::user()->id;
        $friends1 = DB::table('friendships')
                    ->leftJoin('users', 'users.id', 'friendships.user_requested')
                    ->where('status', 1)
                    ->where('requester', $uid)
                    ->get();
        $friends2 =  DB::table('friendships')
                    ->leftJoin('users', 'users.id', 'friendships.requester')
                    ->where('status', 1)
                    ->where('user_requested', $uid)
                    ->get();
    
        $friends = array_merge($friends1->toArray(),$friends2->toArray());
        // dd($friends);
    	$user = User::where('slug', $slug)->first();
    	return view('profiles.profile', compact('friends'))
    		->with('user', $user)
            ->with('friends', $friends);
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

                'avatar' => $r->avatar->store('avatars')
            ]);
        }
    	Alert::message('Profile Updated');
    	return redirect()->back();
    }
    public function friends()
    {
        
    }
    
}

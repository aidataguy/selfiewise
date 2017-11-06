<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;
use DB;
use App\Friendship;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $user = User::all();
        $count = Friendship::where('status','=','1')->count();
        return view('home', compact('friends'))
            ->with('user', $user);

    }
    public function notifications()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return view('nots')->with('nots', Auth::user()->notifications);

    }
    public function post_index()
    {
        $user = Auth::user();
        $posts = Post::all();

        return view('home', compact('posts', 'user'));
    }
    public function my_friends()
    {
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Follow;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function home(){
        $follow = Follow::where('primary_id',Auth()->user()->id)->get();
        $posts = Post::latest()->get();
        // return $follow;
        return view('home',compact('follow','posts'));
    }

    public function users()
    {
        $users = User::all();
        $follow = Follow::where('primary_id',Auth()->user()->id)->get();
        // return $users[2]->user2->name;
        
        // return $users->follow1;
        // return $users->follow1[0]->secondary_id;
        return view('users',compact('users','follow'));
    }

   

    public function profile($id){

        $posts = Post::where('secondary_id',$id)->latest()->get();
        $user = User::where('id',$id)->first();
        $followers = Follow::where('secondary_id',$id)->count();
        $following = Follow::where('primary_id',$id)->count();
        $post_count = Post::where('secondary_id',$id)->count();
        return view('profile',compact('posts','user','followers','following','post_count'));
    }

    public function following(){
        $follow = Follow::where('primary_id',Auth()->user()->id)->get();
        return view('following',compact('follow'));
    }

    public function follow(Request $request){
        Follow::create($request->all());
        return back();
    }

    public function unfollow(Request $request){
        $user = Follow::where('primary_id',$request->primary_id)->where('secondary_id',$request->secondary_id)->first();
        $user->delete();
        return back();
    }
}

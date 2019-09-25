<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\post;
class PagesController extends Controller
{
    public function userProfile($id){
        //dd($id);
        $user=User::findorfail($id);
        return view('userprofiles')->with('user',$user);
    }
    public function explorePosts(){
        $posts=Post::orderBy('created_at','DESC')->get();
        
        return view('newsfeed')->with('posts',$posts);
    }
}

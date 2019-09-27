<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\User;
use App\post;
class PagesController extends Controller
{
    public function userProfile($id){
        //dd($id);
        $user=User::findorfail($id);
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        $postCount=Cache::remember(
            'count.posts.'.$user->id,
            now()->addSeconds(45),
            function () use ($user){
                return  $user->posts()->count();
            }
        );
        
        $followersCount=Cache::remember(
            'followers.count.'.$user->id,
            now()->addSeconds(45),
            function () use ($user){
                return $user->profile->followers->count();
            }
        );
        
        $followingCount=Cache::remember(
            'following.count'.$user->id,
            now()->addSeconds(45),
            function () use ($user){
                return $user->following->count();
            }
        );
        
        return view('userprofiles',compact('user','follows','postCount','followersCount','followingCount'));
    }
    public function explorePosts(){
        $posts=Post::orderBy('created_at','DESC')->paginate(15);
        
        return view('newsfeed')->with('posts',$posts);
    }
}

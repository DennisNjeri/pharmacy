<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\profile;
use App\post;
use App\User;
class ProfileController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }
    public function createProfile(Request $request){
        //dd($request->all());
        
       $data= $request->validate([
            'title'=>['required','string'],
            'description'=>['required','string'],
            'url'=>['required','string'],
            'image'=>''
        ]);
    
        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));
     
     return redirect("/home")->with('success','Profile created');
        
    }
    public function viewProfile(){
        $userId=auth()->user()->id;
        $results=Post::Where('user_id',$userId)->get();

        return view('profile')->with('posts',$results);
    }
    public function editProfile(){
        $profile=auth()->user()->profile();
        //dd($profile);
        return view('editView',compact('profile'));
    }
   
    
}

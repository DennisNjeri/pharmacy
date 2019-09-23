<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
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
        ]);
    //$profile = new Profile();
   // $profile->title=$request->input('title');
    //$profile->description=$request->input('description');
    //$profile->link=$request->input('url');
   // $profile->save();
     auth()->user()->profile()->create($data);

     //dd($request->all());
     return redirect("/home")->with('success','Profile created');
        
    }
    public function viewProfile(){

        return view('profile');
    }
}

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
   // $profile->title=$request->title;
    //$profile->description=$request->description;
    //$profile->link=$request->url;
   // $profile->save();
     auth()->user()->profile()->create($data);

     dd($request->all());
        
    }
}

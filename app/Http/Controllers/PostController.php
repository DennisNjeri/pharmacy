<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;

class PostController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'caption'=>'required',
            'description'=>'required',
            
        ]);
        $filename=$request->file('image');
        $filename1=$request->file('image2');
        $filemodname="post_".auth()->user()->id.time().$filename->getClientOriginalName();
        $filemodname1="post_".auth()->user()->id.time().$filename1->getClientOriginalName();
        $image=$filename->storeAs('posts',$filemodname);
        $image2=$filename1->storeAs('posts',$filemodname1);

        $post= new Post();
        $post->user_id=auth()->user()->id;
        $post->caption=$request->input('caption');
        $post->description=$request->input('description');
        $post->image=$image;
        $post->image2=$image2;
        $post->save();
        return view('home')->with('success','Post added Successfully');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

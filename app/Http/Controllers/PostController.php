<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\post;
use App\User;

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
        $user=User::all();
        $users=auth()->user()->following()->pluck('profiles.user_id');
        $posts=Post::whereIn('user_id',$users)->with('user')->latest()->paginate(5);
        
       return view('usernewsfeed',compact('posts'));
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
        $filename->move('storage/posts', $filemodname);
        $filename1->move('storage/posts', $filemodname1);

     // $path= $filename->storeAs('posts',$filemodname,'public');
      // $path2= $filename1->storeAs('posts',$filemodname1,'public');
       
        $formatImageOne=Image::make(storage_path('app/public/posts/'.$filemodname))->fit(1200,1200);
        $formatImageTwo=Image::make(storage_path('app/public/posts/'.$filemodname1))->fit(1200,1200);
        $formatImageOne->save();
        $formatImageTwo->save();
        $image='posts/'.$filemodname;
        $image2='posts/'.$filemodname1;
        $post= new Post();
        $post->user_id=auth()->user()->id;
        $post->caption=$request->input('caption');
        $post->description=$request->input('description');
        $post->image=$image;
        $post->image2=$image2;
        $post->save();
        return redirect('/home')->with('success','Post added Successfully');
   
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
        //dd($id);
        $post=Post::findorfail($id);
        $follows = (auth()->user()) ? auth()->user()->following->contains($post->user()->first()->id) : false;
        return view('singlePost',compact('post','follows'));
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
        $post=Post::find($id);
        Storage::delete('public/'.$post->image);
        Storage::delete('public/'.$post->image2);
        Post::where('id',$id)->delete();
        return redirect('/profile')->with('success','Post deleted Successfully');
    }
   
}

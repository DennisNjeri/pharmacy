@extends('layouts.app')

@section('content')
    
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @include('layouts.messages')
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>{{ Auth::user()->username  }}</h3>
                            <h5>{{ Auth::user()->profile->title  }}</h5>
                            <div>{{ Auth::user()->profile->description ?? Null }}</div>
                            <div><a href="./{{ Auth::user()->profile->url}}"><small>{{ Auth::user()->profile->url  }}</small></a></div>
                            <p><a href="/editProfile">Edit Profile</a></p>
                        </div> 
                        <div class="col-md-4">
                            <img src="{{Auth::user()->profile->profileImage()}} " alt="profile photo" class="rounded-circle" width="125px"> 
                        </div>
                    </div>   
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <p> {{ Auth::user()->posts->count()}} posts</p>
                        </div>
                        <div class="col-md-3">
                            <p> 23k following</p>
                        </div>
                        <div class="col-md-3">
                            <p> 20k followers</p>
                        </div>
                        <div class="col-md-3">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            Explore
                            </button>
                        </div>
                </div>
            </div> 
            <div class="card">
                <div class="card-header">
                    <h3>Your Posts</h3>
                 
                </div>
                <div class="card-body">
                    <div class="row">
                    @if(count($posts)>0)
                        @foreach($posts as $post)
                        <div class="col-md-4 pl-3 pb-4">
                           <a href="posts/{{$post->id}}"> <p class="pl-5">  {{ $post->caption }}</p></a>

                            <div style="height:400px; width:320px;overflow: hidden;margin: 20px;">
                            <a href="posts/{{$post->id}}"> 
                            <img src="{{ URL::asset('/storage/'.$post->image) }}" alt="Imagery" class="img-responsive" style="width:100%">
                            </a>
                            </div>
                          </div>
                        @endforeach
                    @endif
                       
                </div>
            </div> 
           </div>
          </div> 
          </div>

    
@endsection    
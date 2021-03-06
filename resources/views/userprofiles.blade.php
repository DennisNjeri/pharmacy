@extends('layouts.app')

@section('content')
    
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @include('layouts.messages')
            <div class="card">
                <div class="card-header">
                <h3>{{ $user->profile()->first()->title }}</h3>
                    <p>{{ $user->profile()->first()->description  }}</p>
                    <p><small>{{ $user->profile()->first()->url  }}</small></p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <p> {{ $postCount}} posts</p>
                        </div>
                        <div class="col-md-3">
                            <p> {{ $followersCount}} Followers</p>
                        </div>
                        <div class="col-md-3">
                            <p>{{ $followingCount}} Following</p>
                        </div>
                        <div class="col-md-3">
                            <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                        </div>
                </div>
            </div> 
            <div class="card">
                <div class="card-header">
                    <h3>Your Posts</h3>
                 
                </div>
                <div class="card-body">
                    <div class="row">
                   
                        @foreach($user->posts as $post)
                        <div class="col-md-4 pl-3 pb-4">
                           <a href="/posts/{{$post->id}}"> <p class="pl-5">  {{ $post->caption }}</p></a>

                            <div style="height:400px; width:320px;overflow: hidden;margin: 20px;">
                            <a href="/posts/{{$post->id}}"> 
                            <img src="{{ URL::asset('/storage/'.$post->image) }}" alt="Imagery" class="img-responsive" style="width:100%">
                            </a>
                            </div>
                          </div>
                        @endforeach
                   
                       
                </div>
            </div> 
           </div>
          </div> 
          </div>

    
@endsection    
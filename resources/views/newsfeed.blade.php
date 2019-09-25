@extends('layouts.app')

@section('content')
    @include('layouts.messages')
    <div class="container">
    @foreach($posts as $post)
    <div class="pb-4">
    <div class="row justify-content-center ">
        <div class="col-md-8">
        @include('layouts.messages')
        
            <div class="card ">
                <div class="card-header">
                    <a href="userprofiles/{{$post->user->id}}">
                        <h5>User:{{ $post->user()->first()->username }}</h5>  
                    </a>      
                </div>
                <div class="card-body">      
                    <div class="card">
                        <div class="card-header">
                            <p>Caption: {{ $post->caption }}</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="posts/{{$post->id}}"> 
                                            <img src="{{ URL::asset('/storage/'.$post->image) }}" alt="Imagery" class="img-responsive" style="width:100%">
                                    </a>     
                                </div>   
                            </div>
                            <p>{{$post->description}}</p>
                        <div>
                    </div>
            </div> 
          </div>   
        </div>     
    </div>
 </div>
 <br><br><br>
 @endforeach    
  </div>  
@endsection    
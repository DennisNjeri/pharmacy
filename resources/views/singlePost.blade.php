@extends('layouts.app')

@section('content')
    @include('layouts.messages')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @include('layouts.messages')
            <div class="card">
                <div class="card-header">
                    <a href="/userprofiles/{{$post->user()->first()->id}}">
                        <h3>{{ $post->user()->first()->username  }}</h3>
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                    @if($post->user()->first()->id == Auth::user()->id)
                        <div class="col-md-3">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            Update
                            </button>
                        </div>
                        <div class="col-md-3">
                        <a href="/deleteposts/{{$post->id}}">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                            Delete
                        </button>
                        </a>
                        </div>
                    @endif  
                    @if($post->user()->first()->id != Auth::user()->id)
                       <div class="col-md-3">
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                              Follow
                            </button>
                        </div> 
                        @endif  
                        <div class="col-md-3">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            Explore
                            </button>
                        </div>
                </div>
            </div> 
            <div class="card">
                <div class="card-header">
                    <h3> {{ $post->caption }}</h3>
                 
                </div>
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-12">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ URL::asset('/storage/'.$post->image) }}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="{{ URL::asset('/storage/'.$post->image2) }}" alt="Second slide">
                            </div>
                            
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>
                       
                </div>
                </div>
                <div>
                    <p>{{$post->description}}</p>
                </div>
            </div> 
           </div>
          </div> 
          </div>

    
@endsection    
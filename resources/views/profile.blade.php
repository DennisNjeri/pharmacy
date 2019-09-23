@extends('layouts.app')

@section('content')
    @include('layouts.messages')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @include('layouts.messages')
            <div class="card">
                <div class="card-header">
                    <h3>{!! Auth::user()->profile->title ?? 'Setup Your Profile to view profile info <a href="/home">Create Profile</a>' !!}</h3>
                    <p>{{ Auth::user()->profile->description ?? Null }}</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <p> 23k following</p>
                        </div>
                        <div class="col-md-4">
                            <p> 20k followers</p>
                        </div>
                        <div class="col-md-4">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            Explore
                            </button>
                        </div>
                </div>
            </div> 
           </div>
          </div> 
          </div>

    
@endsection    
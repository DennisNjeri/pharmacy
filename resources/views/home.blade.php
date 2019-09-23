@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @include('layouts.messages')
            <div class="card">
                <div class="card-header">

                   <ul class="list-group flex-md-row">
                        <li class="list-group-item">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                 Update Profile
                            </button>
                        </li>
                        <li class="list-group-item"><a href="/profile">View Profile</a></li>
                        <li class="list-group-item"> 
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                 Add new Post
                            </button>
                        </li>
                        <li class="list-group-item">Settings</li>
                    </ul>
                
                </div>

             <div class="card-body">
                  <!-- Button trigger modal -->
                

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalCenterTitle">Profile Setup</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <div class="modal-body">
                            <form method="post" action="{{ url('/home')}}">
                              @csrf
                                <div class="form-group">
                                     <label for="exampleInputEmail1">Title</label>
                                    <input type="text"  name="title" class="form-control"  placeholder="Enter Title">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" placeholder="Enter a brief description">
                                    </textarea>
                            
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">URL</label>
                                    <input type="text" name="url" class="form-control"  placeholder="Enter URL">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
             </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalCenterTitle">POST CREATION</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('createPost') }}" enctype="multipart/form-data">
                              @csrf
                                <div class="form-group">
                                     <label for="exampleInputEmail1">Caption</label>
                                    <input type="text"  name="caption" class="form-control"  placeholder="Enter Title">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" placeholder="Enter a brief description">
                                    </textarea>
                            
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Image One</label>
                                    <input type="file" name="image" class="form-control"  placeholder="Select Image">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Image Two</label>
                                    <input type="file" name="image2" class="form-control"  placeholder="Select  Second Image">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>
        </div>
    </div>
</div>
@endsection

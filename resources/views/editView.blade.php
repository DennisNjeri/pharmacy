@extends('layouts.app')

@section('content')
    @include('layouts.messages')
    <div class="container">
    <div class="pb-4">
    <div class="row justify-content-center ">
        <div class="col-md-8">
        @include('layouts.messages')
        
            <div class="card ">
                <div class="card-header">
                   
                        <h5>Update your profile Details</h5>  
                        
                </div>
                <div class="card-body">      
                   <form method="post" action="{{ url('/home')}}" enctype="multipart/form-data">
                 
                        @csrf
                        <div class="form-group">
                                <label for="exampleInputEmail1">TITLE</label>
                            <input type="text"  name="title" class="form-control"  placeholder="Enter Title" value="{{$profile->first()->title}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" placeholder="Enter a brief description">
                            {{$profile->first()->description}}
                            </textarea>
                    
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">URL</label>
                            <input type="text" name="url" class="form-control"  placeholder="Enter URL" value="{{$profile->first()->url}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file" name="image" class="form-control"  placeholder="Enter image" >
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div> 
          </div>   
        </div>     
    </div>
 </div>
 <br><br><br>
    
  </div>  
@endsection    
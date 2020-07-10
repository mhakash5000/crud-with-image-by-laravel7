@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success d-flex justify-content-between align-items-center">
            <h5>Edit Students</h5>
                    <a href="{{route('home')}} " class="btn btn-dark">Student List</a>
                </div>

                <div class="card-body col-md-6 offset-3 ">

                    <form action="{{route('update.student',$studentId->id)}} " method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(Session::has('success'))
                    <div class="btn btn-success">{{Session::get('success')}} </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="my-input">Name</label>
                        <input id="my-input" name="name" class="form-control" type="text" value="{{$studentId->name}}" required >
                    </div>
                    <div class="form-group">
                        <label for="my-input">Phone</label>
                        <input id="my-input" name="phone" class="form-control" type="tel" value="{{$studentId->phone}}" required>
                    </div>
                    <div class="form-group">
                        <label for="my-input">E-mail</label>
                        <input id="my-input" name="email" class="form-control" type="email" value="{{$studentId->email}}" required >
                    </div>
                    <div class="form-group">
                        <img src="{{asset('upload/user_images/'.$studentId->image)}}" id="image" style="width:90px;height:100px">
                        <input id="my-input" name="image"class="form-control" type="file" name="image" id="file" onchange="showImage(this,'image')" value=''>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

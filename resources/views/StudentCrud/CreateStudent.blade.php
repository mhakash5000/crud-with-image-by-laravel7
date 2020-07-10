@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success d-flex justify-content-between align-items-center">
            <h5>Add Students</h5>
                    <a href="{{route('home')}} " class="btn btn-dark">Student List</a>
                </div>

                <div class="card-body col-md-6 offset-3 ">

                    <form action="{{route('store.student')}} " method="POST" enctype="multipart/form-data">
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
                        <input id="my-input" class="form-control"  placeholder="mh akash" type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="my-input">Phone</label>
                        <input id="my-input" class="form-control"  placeholder="017XXX"type="tel" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="my-input">E-mail</label>
                        <input id="my-input" class="form-control" placeholder="mhakash5000@gmail.com" type="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="my-input">Image</label>
                        <input id="my-input" class="form-control" type="file" name="image" required>

                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

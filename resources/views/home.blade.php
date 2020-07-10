@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-success d-flex justify-content-between align-items-center">
                    <h5>Student List</h5>
                    <a href="{{route('create.student')}} "class="btn btn-dark">Create Student</a>
                </div>

                <div class="card-body ">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Phone</td>
                                <td>E-mail</td>
                                <td>Image</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($student as $item)
                            <tr>
                                <td>{{($item->id)}}</td>
                                <td>{{($item->name)}}</td>
                                <td>{{($item->phone)}}</td>
                                <td>{{($item->email)}}</td>
                                <td><img src="{{asset('upload/user_images/'.$item->image)}}" width="90px";height='100px' alt=""></td>

                                <td>
                                    <a href="{{route('edit.student',$item->id)}} " class="btn btn-primary">Edit</a>
                                    <a href="{{route('destroy.student',$item->id)}}" id="delete" title="Delete" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

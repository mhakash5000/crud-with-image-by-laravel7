<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $student=Student::all();
        return view('home',compact('student'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('StudentCrud.CreateStudent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:students|max:255',
            'image' => 'required',

        ]);
       $StudentData=new Student();
       $StudentData->name=$request->name;
       $StudentData->phone=$request->phone;
       $StudentData->email=$request->email;
       if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $myImage=time().'.'.$extension;
            $file->move('upload/user_images/',$myImage);
            $StudentData->image=$myImage;
        }else{
            return $request;
            $StudentData->image='';
        }
       $StudentData->save();
       Session::flash('success','Student Created successfully');
       return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student,$id)
    {
        $studentId=Student::find($id);
        return view('StudentCrud.EditStudent',compact('studentId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $updateData=Student::find($id);
       $updateData->name=$request->name;
       $updateData->phone=$request->phone;
       $updateData->email=$request->email;
       if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $myImage=time().'.'.$extension;
            $file->move('upload/user_images/',$myImage);
            $updateData->image=$myImage;
        }else{
            return $request;
            $updateData->image='';
        }
       $updateData->save();
       Session::flash('success','Student Updated successfully');
       return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteStudent=Student::find($id);
        $deleteStudent->delete();
        return redirect()->route('home');
    }
}

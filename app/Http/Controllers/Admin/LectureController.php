<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecture;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LectureController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lectures = Lecture::with('course')->paginate(10);
        return view('admin.lectures.index' , compact('lectures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::select('id','title')->get();
        return view('admin.lectures.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     =>'required|string|max:255',
            'link'      =>'required|string',
            'image'     =>'required|file',
            'course_id' =>'required'
        ]);
        Lecture::create([
            'title'     => $request->title,
            'link'      => $request->link ,
            'image'     => $this->imageUpload($request->file('image') ,'images/lectures'),
            'course_id' => $request->course_id,
        ]);
        return redirect()->route('lectures.index')->with('success','lectures add sucessfuly');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecture = Lecture::findOrFail($id);
        $course = Course::select('id','title')->get();
        return view('admin.lectures.edit', compact('lecture','course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        $lecture = Lecture::findOrFail($id);
        $request->validate([
            'title'     =>'required|string|max:255',
            'link'      =>'required|string',
            'image'     =>'nullable|file',
            'course_id' =>'required'
        ]);

        if($request->has('image')){
          File::delete($lecture->image);
          $image = $this->imageUpload($request->file('image') ,'images/lectures') ;
        }else{
            $image = $lecture->image ;  
        }

        $lecture->update([
            'title'     => $request->title,
            'link'      => $request->link ,
            'image'     => $image ,
            'course_id' => $request->course_id,
        ]);
        return redirect()->route('lectures.index')->with('success','lectures updated sucessfuly'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lecture = Lecture::findOrFail($id);
        File::delete($lecture->image);
        $lecture -> delete();
        return redirect()->route('lectures.index')->with('success','lecture is deleted');
    }
}

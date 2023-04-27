<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Department;
use App\Models\Level;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::select('id','title','image','description','price','level_id','department_id','created_at')->paginate(12);
        return view('admin.courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::select('id','name')->get();
        $departments = Department::select('id','name')->get();
        return view('admin.courses.create',compact('levels','departments'));
        // return view('admin.courses.create',compact('levels'));
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
            'title'        =>'required|string|max:250',
            'image'        =>'nullable|file',
            'description'  =>'required',
            'price'        =>'required',
            'level_id'     =>'required',
            'department_id'=>'required',
          ]);
          Course::create([
            'title'        =>$request->title,
            'image'        =>$this->imageUpload($request->file('image') , 'images/courses'),
            'description'  =>$request->description,
            'price'        =>$request->price,
            'level_id'     =>$request->level_id,
            'department_id'=>$request->department_id,

          ]);
          return redirect()->route('Courses.index')->with('success','course add sucessfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $level=Level::select('id','name')->get();
        $department=Department::select('id','name')->get();
        return view('admin.courses.edit',compact('course','level','department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'title'=>'required|string|max:250',
            'image'        =>'nullable|file',
            'description'=>'required',
            'price'=>'required',
            'level_id'=>'required',
            'department_id'=>'required',
      ]);

        if($request->has('image')){
          File::delete($course->image);
          $course->image=$this->imageUpload($request->file('image') , 'images/courses');
        }

          $course->title = $request->title;
          $course->description = $request->description;
          $course->price = $request->price;
          $course->level_id = $request->level_id;
          $course->department_id = $request->department_id;
          $course->save();

        return redirect()->route(route:'Courses.index')->with('success','Course  updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $Course)
    {
        File::delete($Course->image);
        $Course -> delete();
        return redirect()->route('Courses.index')->with('success','course is deleted');
    }
}

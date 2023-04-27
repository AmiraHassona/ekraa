<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Department;
use App\Models\Level;
use App\Models\Student;
use App\Models\StudentCourse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role','student')->with('student.level','student.department')->paginate(12);
        return view('admin.students.index',compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Respstudentsonse
     */
    public function create()
    {
        $levels=Level::select('id','name')->get();
        $departments=Department::select('id','name')->get();
        return view('admin.students.create',compact('levels','departments'));
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
        'name'=>'required|string|min:3|max:250',
        'email'=>'required|email|unique:users',
        'password'=>'required',
        'level_id'=>'required',
        'department_id'=>'required',
      ]);
      $user = User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
      ]);
      Student::create([
        'user_id' =>$user->id ,
        'level_id'=>$request->level_id,
        'department_id'=>$request->department_id,
      ]);
      return redirect()->route('students.index')->with('success','student added sucessfuly');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $student =Student::where( 'user_id',$id)->first();
        $level=Level::select('id','name')->get();
        $department=Department::select('id','name')->get();
        return view('admin.students.edit',compact('user','student','level','department'));
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
        $user = User::findOrFail($id);
        $student = $user->student;

        $request->validate([
            'name'=>'required|string|min:3|max:250',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'level_id'=>'required',
            'department_id'=>'required',
      ]);

          $user->name = $request->name;
          $user->email = $request->email;
          $user->password = Hash::make($request->password) ;
          $user->save();


          $student->level_id = $request->level_id;
          $student->department_id = $request->department_id;
          $student->save();

        return redirect()->route(route:'students.index')->with('success','student   updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user -> delete();
        return redirect()->route('students.index')->with('success','student is deleted');
    }


    public function studentcourses($id){
        $user = User::findOrFail($id);
        $student = $user->student;
        $studentCourses=$student->courses()->with('course')->paginate(12);

        return view('admin.students.courses',compact('user','studentCourses'));
    }

    public function addCoursesToStudentForm($id)
    {
        $user = User::findOrFail($id);
        $student = $user->student;

        $courses=Course::select('id','title')->where('level_id',$student->level_id)->where('department_id',$student->department_id)->get();

        return view('admin.students.addcourse',compact('user','courses'));
    }

    public function addCoursesToStudent(Request $request , $id)
    {
     $user = User::findOrFail($id);
     $student = $user->student;

      $request->validate([
       // 'student_id' =>'required',
        'course_id'  =>'required',
      ]);

      if(StudentCourse::where('student_id', $student->id)->where('course_id', $request->course_id)->first() == null){
        StudentCourse::create([
            'student_id' =>$student->id ,
            'course_id'  =>$request->course_id,
            ]);
          return redirect()->route('students.courses', $user->id)->with('success','courses added sucessfuly');

        }else{

           return redirect()->back()->with('error','course alreedy added');
        }

    // StudentCourse::firstOrCreate([

    //           'student_id' =>$student->id ,
    //           'course_id'  =>$request->course_id,
    //         ]);

    //           return redirect()->route('students.courses', $user->id)->with('success','courses added sucessfuly');

    }

    public function deleteCourseFromStudent($id)
    {
        $StudentCourse = StudentCourse::findOrFail($id);
        $StudentCourse -> delete();
        return redirect()->back()->with('success','course is deleted');
    }

}

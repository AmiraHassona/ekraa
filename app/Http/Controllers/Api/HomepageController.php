<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    use ResponseTrait;
    
    public function courses(){
      $courses= Course::paginate(10);
      return $this->returnData("courses",CourseResource::collection($courses));
    }

    public function filterCourses(Request $request){
        $courses= Course::where('level_id',$request->level_id)->where('department_id',$request->department_id)->paginate(10);
        return $this->returnData("courses",CourseResource::collection($courses));
    }

    public function course($id){
        $course= Course::where('id', $id)->get();
        return $this->returnData("courses",CourseResource::collection($course));
    }
}

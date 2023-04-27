<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Level;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class GeneralRequestController extends Controller
{
    use ResponseTrait;
    public function levels(){
      return $this->returnData("levels",Level::select('id','name')->get());
    }

    public function departments($id){
      $departments = Department::where('level_id',$id)->select('id','name')->get();
      return $this->returnData("departments" , $departments);
    }

}

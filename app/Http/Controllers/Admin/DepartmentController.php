<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Level;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::select('id','name','level_id','created_at')->paginate(12);
        return view('admin.departments.index',compact('departments'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels=Level::select('id','name')->get();
        return view('admin.departments.create',compact('levels'));
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
        'name'=>'required|string|min:3|max:250|unique:departments',
        'level_id'=>'required',
      ]);
      Department::create([
        'name'=>$request->name,
        'level_id'=>$request->level_id,
      ]);
      return redirect()->route('departments.index')->with('success','department add sucessfuly');
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
        $department = Department::findOrFail($id);
        $level=Level::select('id','name')->get();
        return view('admin.departments.edit',compact('department','level'));
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
        $department = Department::findOrFail($id);

        $request->validate([
            'name'=>'required' ,
            'level_id'=>'required',
      ]);

          $department->name = $request->name;
          $department->level_id = $request->level_id;
          $department->save();

        return redirect()->route(route:'departments.index')->with('success','department  updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department -> delete();
        return redirect()->route('departments.index')->with('success','department is deleted');
    }
}

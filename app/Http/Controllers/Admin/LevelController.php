<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels=Level::select('id','name','created_at')->paginate(15);
        return view('admin.levels.index', compact('levels'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.levels.create');
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
            'name'=>'required|string|min:3|max:250|unique:levels',
        ]);
        level::create([
            'name'=>$request->name,
        ]);
        return redirect()->route(route:'levels.index')->with('success','level add sucessfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $level = Level::findOrFail($id);
        return View('admin.levels.edit', compact('level'));
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
        $level = Level::findOrFail($id);

        $request->validate([
            'name'=>'required|string|min:3|max:250|unique:levels,id,name'.$id ,

        ]);

          $level->name = $request->name;
          $level->save();

        return redirect()->route(route:'levels.index')->with('success','level  updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(level $level)
    {
        $level -> delete();
        return redirect()->route(route:'levels.index')->with('success','level is deleted');

    }
}

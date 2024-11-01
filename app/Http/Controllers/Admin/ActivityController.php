<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::orderBy('id','desc')->get();
        return view('admin.activity.index',compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.activity.form');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Activity::createOrUpdateActivity($request);
        return back()->with('success','Activity Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $activity = Activity::find($id);
        return view('admin.activity.form',compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Activity::createOrUpdateActivity($request,$id);
        return redirect()->route('activity.index')->with('warning','Activity Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Activity::deleteActivity($id);
        return back()->with('error','Activity Deleted Successfully.');
    }
}

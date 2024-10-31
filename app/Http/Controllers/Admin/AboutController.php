<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::orderBy('id','desc')->get();
        return view('admin.about.index',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.form');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        About::createOrUpdateAbout($request);
        return back()->with('success','About Created Successfully.');
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
        $about = About::find($id);
        return view('admin.about.form',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        About::createOrUpdateAbout($request,$id);
        return redirect()->route('about.index')->with('warning','Video Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        About::deleteAbout($id);
        return back()->with('error','About Deleted Successfully.');
    }
}

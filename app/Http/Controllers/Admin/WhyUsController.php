<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\WhyUs;
use Illuminate\Http\Request;

class WhyUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $whyUs = WhyUs::orderBy('id','desc')->get();
        return view('admin.why_us.index',compact('whyUs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.why_us.form');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        WhyUs::createOrUpdateWhyUs($request);
        return back()->with('success','Why Us Created Successfully.');
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
        $whyUs = WhyUs::find($id);
        return view('admin.why_us.form',compact('whyUs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        WhyUs::createOrUpdateWhyUs($request,$id);
        return redirect()->route('why-us.index')->with('warning','Why Us Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        WhyUs::deleteWhyUs($id);
        return back()->with('error','Why Us Deleted Successfully.');
    }
}

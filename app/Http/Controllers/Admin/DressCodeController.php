<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\DressCode;
use Illuminate\Http\Request;

class DressCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dresses = DressCode::orderBy('id','desc')->get();
        return view('admin.dress.index',compact('dresses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dress.form');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DressCode::createOrUpdateDressCode($request);
        return back()->with('success','Dress Code Created Successfully.');
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
        $dress = DressCode::find($id);
        return view('admin.dress.form',compact('dress'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DressCode::createOrUpdateDressCode($request,$id);
        return redirect()->route('dress.index')->with('warning','Dress Code Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DressCode::deleteDressCode($id);
        return back()->with('error','Dress Code Deleted Successfully.');
    }
}

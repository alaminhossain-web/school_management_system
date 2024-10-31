<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notices = Notice::orderBy('id','desc')->get();
        return view('admin.notice.index',compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.notice.form');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Notice::createOrUpdateNotice($request);
        return back()->with('success','Notice Created Successfully.');
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
        $notice = Notice::find($id);
        return view('admin.notice.form',compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Notice::createOrUpdateNotice($request,$id);
        return redirect()->route('notice.index')->with('warning','Notice Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Notice::deleteNotice($id);
        return back()->with('error','Notice Deleted Successfully.');
    }
}

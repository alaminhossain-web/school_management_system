<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy('id','desc')->get();
        return view('admin.event.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.event.form');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Event::createOrUpdateEvent($request);
        return back()->with('success','Event Created Successfully.');
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
        $event = Event::find($id);
        return view('admin.event.form',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Event::createOrUpdateEvent($request,$id);
        return redirect()->route('event.index')->with('warning','Event Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Event::deleteEvent($id);
        return back()->with('error','Event Deleted Successfully.');
    }
}

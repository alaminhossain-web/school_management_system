<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\VideoGallery;
use Illuminate\Http\Request;

class VideoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = VideoGallery::orderBy('id','desc')->get();
        return view('admin.video.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.video.form');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        VideoGallery::createOrUpdateVideo($request);
        return back()->with('success','Video Created Successfully.');
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
        $video = VideoGallery::find($id);
        return view('admin.video.form',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        VideoGallery::createOrUpdateVideo($request,$id);
        return redirect()->route('video-gallery.index')->with('warning','Video Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        VideoGallery::deleteVideo($id);
        return back()->with('error','Video Deleted Successfully.');
    }
}

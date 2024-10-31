<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\PhotoGallery;
use Illuminate\Http\Request;

class PhotoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = PhotoGallery::orderBy('id','desc')->get();
        return view('admin.photo.index',compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.photo.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        PhotoGallery::createOrUpdatePhoto($request);
        return back()->with('success','Photo Created Successfully.');
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
        $photo = PhotoGallery::find($id);
        return view('admin.photo.form',compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        PhotoGallery::createOrUpdatePhoto($request,$id);
        return redirect()->route('photo-gallery.index')->with('warning','Photo Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PhotoGallery::deletePhoto($id);
        return back()->with('error','Photo Deleted Successfully.');
    }
}

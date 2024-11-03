<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ClassCategory;
use Illuminate\Http\Request;

class ClassCategoryController extends Controller
{
    public $classCategory;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryId = request()->get('category-id', 0); // Default to 0 if 'category-id' is not provided
        $this->classCategory = ClassCategory::where('class_category_id', $categoryId)->latest()->get();
    
        return view('admin.class-category.index', [
            'classCategories' => $this->classCategory
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.class-category.form');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ClassCategory::createOrUpdateClassCategory($request);
        return back()->with('success','Class Category Created Successfully.');
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
        return view('admin.class-category.form',[
            'classCategory' => ClassCategory::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        ClassCategory::createOrUpdateClassCategory($request,$id);
        return redirect()->route('class-category.index')->with('update','Class Category Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ClassCategory::deleteClassCategory($id);
        return back()->with('error','Class Category Deleted Successfully.');
    }
}

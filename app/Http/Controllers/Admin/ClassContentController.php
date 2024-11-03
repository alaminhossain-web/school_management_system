<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ClassCategory;
use App\Models\Admin\ClassContent;
use Illuminate\Http\Request;

class ClassContentController extends Controller
{
    public $classContent;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $this->classContent = ClassContent::latest()->get();
    
        return view('admin.class.index', [
            'classContents' => $this->classContent
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.class.form',[
            'classCategories'=>ClassCategory::where('class_category_id', '!=', 0)->get()

        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ClassContent::createOrUpdateClassContent($request);
        return back()->with('success','Class Content Created Successfully.');
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
        return view('admin.class.form',[
            'classContent' => ClassContent::find($id),
            'classCategories'=>ClassCategory::where('class_category_id', '!=', 0)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        ClassContent::createOrUpdateClassContent($request,$id);
        return redirect()->route('class.index')->with('update','Class Content Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ClassContent::deleteClassContent($id);
        return back()->with('error','Class Content Deleted Successfully.');
    }
}

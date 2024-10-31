<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller 
{
    public function __construct()
    {
        $this->middleware('permission:view permissions')->only(['index']);
        $this->middleware('permission:edit permissions')->only(['edit']);
        $this->middleware('permission:create permissions')->only(['create']);
        $this->middleware('permission:delete permissions')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::orderBy('created_at','desc')->paginate(25);
        return view('admin.permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permission.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:permissions|min:3'
        ]);
        if($validator->passes()){
            Permission::create([
                'name' => $request->name
            ]);
            flash()->addSuccess('Permission Created successfully!');

            return back();
            
        }else{
            flash()->addError('Failed to create permission. Please correct the errors.');
            flash()->addWarning('Ensure all required fields are filled out.');
            flash()->addInfo('Permission names must be unique and at least 3 characters.');
            return back()->withInput()->withErrors($validator);
        }
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
        $permission = Permission::findOrFail($id);
        return view('admin.permission.form',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $id . ',id|min:3',
        ]);
    
        $permission = Permission::findOrFail($id);
        $permission->update([
            'name' => $request->name
        ]);
    
        flash()->addWarning('Permission Updated successfully!');
    
        return redirect('/permission');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = Permission::find($id);
        // if($permission == null)
        // {
        //     return response()->json([
        //         'status' => false
        //     ]);
        // }
        $permission->delete();
        // flash()->addError('Permission Deleted successfully!');

        return back()->with('error','Permission Deleted successfully!');
    }
}

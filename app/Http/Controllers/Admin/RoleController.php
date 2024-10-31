<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;


class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view roles')->only(['index']);
        $this->middleware('permission:edit roles')->only(['edit']);
        $this->middleware('permission:create roles')->only(['create']);
        $this->middleware('permission:delete roles')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $permissions = Permission::orderBy('name','asc')->get();
        $roles = Role::orderBy('name','asc')->paginate(25);
        return view('admin.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::orderBy('name','asc')->get();

        return view('admin.role.form',compact('permissions'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:roles|min:3',
            'permission' => 'required'
        ]);
        if($validator->passes()){
           $role = Role::create([
                'name' => $request->name
            ]);
            if(!empty($request->permission)){
                foreach($request->permission as $name){
                    $role->givePermissionTo($name);
                }
            }
            flash()->addSuccess('Role Created successfully!');
            return back();
            
        }else{
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
        $role = Role::findOrFail($id);
        $hasPermissions = $role->permissions->pluck('name');
        $permissions = Permission::orderBy('name','asc')->get();

        return view('admin.role.form',compact('role','permissions','hasPermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id . ',id|min:3',
        ]);
    
        $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->name
        ]);
        if(!empty($request->permission)){
            $role->syncPermissions($request->permission);
        }else{
            $role->syncPermissions([]);
        }
        flash()->addWarning('Role Updated successfully!');
    
        return redirect('/role');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::find($id);
        // if($role == null)
        // {
        //     return response()->json([
        //         'status' => false
        //     ]);
        // }
        $role->delete();
        // toastr()->error('Role Deleted successfully!');

        // return response()->json([
        //     'status'=>true
        // ]);
        return back()->with('error','Role Deleted successfully!');

    }
}

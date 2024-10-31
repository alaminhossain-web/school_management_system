<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view users')->only(['index']);
        $this->middleware('permission:edit users')->only(['edit']);
        $this->middleware('permission:create users')->only(['create']);
        $this->middleware('permission:delete users')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('created_at','desc')->paginate(25);
        // dd($roles);
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::orderBy('name','asc')->get();

        return view('admin.user.form',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:5',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',

        ]);
        if($validator->passes()){
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password= Hash::make($request->password);
            $user ->syncRoles($request->role);
            $user->save();

           
            flash()->addSuccess('User Created successfully!');
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
        $user = User::find($id);
        $roles = Role::orderBy('name','asc')->get();
        $hasRoles = $user->roles->pluck('id');
        return view('admin.user.form',compact('user','roles','hasRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|unique:users,email,' . $id . ',id',
            'password' => 'nullable|string|min:8',

        ]);
    
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        $user ->syncRoles($request->role);
        
        flash()->addWarning('User Updated successfully!');
    
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        // if($user == null)
        // {
        //     return response()->json([
        //         'status' => false
        //     ]);
        // }
        $user->delete();
        // toastr()->error('User Deleted successfully!');

        // return response()->json([
        //     'status'=>true
        // ]);
        return back()->with('error','User Deleted successfully!');

    }
}

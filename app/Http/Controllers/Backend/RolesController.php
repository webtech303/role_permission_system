<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $roles, $permissions, $permission_groups;
    public function index()
    {
        $this->roles = Role::all();
        return view('backend.pages.roles.index',['roles'=>$this->roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->permissions = Permission::all();
        $this->permission_groups = User::getpermissionGroups();
        return view('backend.pages.roles.Create',[
            'permissions'=>$this->permissions,
            'permission_groups'=>$this->permission_groups,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //data validate
        $request->validate([
            'name'=>'required|max:100|unique:roles'
        ],[
            'name.required' => 'Role Name Required'
        ]);

        $role = Role::create(['name' => $request->name]);
        // $role = DB::table('roles')->where('name', $request->name)->first();
        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }
        return redirect()->back()->with('message','Category Info Save Successfully');
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
        $this->roles = Role::findById($id);
        $this->permissions = Permission::all();
        $this->permission_groups = User::getpermissionGroups();
        return view('backend.pages.roles.edit',[
            'roles'=>$this->roles,
            'permissions'=>$this->permissions,
            'permission_groups'=>$this->permission_groups,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

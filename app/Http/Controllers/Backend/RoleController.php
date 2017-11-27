<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Role;
use App\Permission;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $roles = Role::whereNotIn('id',[1])->orderBy('id','desc');
		$roles = $roles->paginate(10);
        return view('backend.roles.index', compact('roles'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $role = new Role;
		$permissions = Permission::get();
		$rolePermissions = [];
		return view('backend.roles.create',compact('role','permissions','rolePermissions'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new Role;
		$this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permissions' => 'required',
        ]);
        $role->fill($request->except('_token'));
		
		$role->save();
		
		if($request->permissions){
        	foreach ($request->permissions as $key => $value) {
	            $role->attachPermission($value);
	        }
        }
        $flash_message = trans('backend.role created successfully');
		return redirect(route('roles.index'))->with(['flash_message' => $flash_message]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);
		$rolePermissions = Permission::join("permission_role","permission_role.permission_id","=","permissions.id")
            ->where("permission_role.role_id",$id)
            ->get();
        return view('backend.roles.view',compact('role','rolePermissions'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $role = Role::findOrFail($id);
		$permissions = Permission::get();
        $rolePermissions = [];
		$oldPermissions = (DB::table("permission_role")->where("permission_role.role_id",$id)->count());
		if($oldPermissions)
		 $rolePermissions = DB::table("permission_role")->where("permission_role.role_id",$id)
            ->pluck('permission_role.permission_id','permission_role.permission_id')->toArray();
//dd($rolePermissions);
        return view('backend.roles.edit',compact('role','permissions','rolePermissions'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $role = Role::findOrFail($id);
		$this->validate($request, [
           // 'name' => 'required|unique:roles,name',
           // 'description' => 'required',
           // 'permissions' => 'required',
        ]);
        $role->fill($request->except('_token'));
		
		$role->save();
		
		DB::table("permission_role")->where("permission_role.role_id",$id)
            ->delete();
        if($request->permissions){
        	foreach ($request->permissions as $key => $value) {
	            $role->attachPermission($value);
	        }
        }
		
        $flash_message = trans('backend.role updated successfully');
		return redirect(route('roles.index'))->with(['flash_message' => $flash_message]);
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Role::destroy($id);
    }
}

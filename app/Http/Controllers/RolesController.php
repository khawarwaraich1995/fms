<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['roles'] = Role::all();
        return view('admin.roles.roles_list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.role_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $update_id = $request->id;

        if (isset($update_id) && !empty($update_id) && $update_id != 0) {
            $roles_data = Role::where('id', $update_id)->first();
            $roles_data->update($request->all());
            return redirect()->route('admin:roles')->with('success', 'Data Updated successfully!');
        } else {
            $role = Role::create(['name' => $request->name]);
            $last_id = $role->id;
            if (isset($last_id) && !empty($last_id)) {
                return redirect()->route('admin:roles')->with('success', 'Role added successfully!');
            } else {
                return back()->with('error', 'Something Went wrong!');
            }
        }
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Roles  $roles
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $data['role'] = Role::find($id);
        return view('admin.roles.role_form', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function permission_modules(Request $request)
    {
        $role_id = $request->id;
        $modules = DB::table('permissions')
                ->select('module')
                ->groupBy('module')
                ->orderBy('id')
                ->get();
        $modules = json_decode($modules, true);
        if (isset($modules) && !empty($modules)) {
            foreach ($modules as $key => $value) {
                $permissions = DB::table('permissions')
                ->select('name', 'id')
                ->where('module', $value)
                ->orderBy('id')
                ->get();
                $modules[$key]['permissions'] = $permissions;
            }
        }
        $data['permissions_list'] = $modules;
        $roles = Role::where('id', $role_id)->first();
        $permissions = $roles->getAllPermissions();
        $active_permissions = array();
        foreach($permissions as $value)
        {
            $active_per_id = json_decode($value->id);
            $active_permissions[] = $active_per_id;

        }
        $data['permissions_active'] = $active_permissions;
        $data['role_id'] = $role_id;
        return view('admin.roles.permission_modules', $data);
    }

    public function permission_modules_update(Request $request)
    {
        $modules = $request->modules;
        $role_id = $request->id;
        if (isset($modules) && isset($role_id) && !empty($modules) && !empty($role_id)) {
            $all_permissions = array();
            foreach ($modules as $value) {
                $permission = Permission::where('name', $value)->get();
                $all_permissions[] = $permission;
            }
            
            if(isset($all_permissions) && !empty($all_permissions))
            {
                $role = Role::where('id', $role_id)->first();
                $role->syncPermissions($all_permissions);
            }
            
            return redirect()->route('admin:roles')->with('success', 'Permissions Updated for '.$role->name.'!');
        } else {
            return back()->with('error', 'Something Went wrong!');
        }
    }
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Roles $roles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roles $roles)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.index',compact('roles'));
    }


    public function create()
    {
        $roles = Role::all();
        return view('admin.roles.create',compact('roles'));
    }


    public function store(Request $request)
    {
        try {
            $role = $this->process(new Role,$request);
            if ($role){
                return redirect()->route('admin.roles.index');
            }else{
                dd('ERROR');
            }
        }
        catch (\Exception $ex){
            return $ex;
        }
        return redirect()->route('admin.roles.index');

    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('admin.roles.edit',compact('role'));
    }


    public function update(Request $request, $id)
    {
        try {
            $role = Role::findOrFail($id);
            $role = $this->process($role,$request);
            if ($role){
                return redirect()->route('admin.roles.index');
            }else{
                dd('ERROR');
            }
        }
        catch (\Exception $ex){
            return $ex;
        }
        return redirect()->route('admin.roles.index');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->back();
        //
    }

    public function process(Role $role,Request $re){
        $role->name = $re->name;
        $role->permissions = json_encode($re->permissions);
        $role->save();
        return $role;
    }
}

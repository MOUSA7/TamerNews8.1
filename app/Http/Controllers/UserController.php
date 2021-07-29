<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Photo;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
//        public function __construct()
//        {
//            $this->authorizeResource(User::class, 'users');
//        }

    public function index()
    {
        $users = User::all();

        return view('admin.users.index',compact('users'));
        //
    }


    public function create()
    {
        $roles = collect(Role::all());
        if (auth()->user()->role_id != 1){
            $roles = $roles->except(['name'=>0]);
        }
//        dd($roles);
        return view('admin.users.create',compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $inputs = $request->all();
        if (trim($request->password) == ''){
            $request->except('password');
        }else{
             $inputs['password'] = bcrypt($request->password);
        }
        if (auth()->user()->role_id !== 1){
            if ($request->role_id == 1 ){
                $this->authorize('create');
            }
        }

        $user = User::create($inputs);

        if ($file = $request->file('photo_id')){
            $name = $file->getClientOriginalName();
            $path = $file->move('images',$name);
            $photo =$user->photo()->save(
                Photo::make(['path'=>'images/'.$name])
            );
        $user->photo_id = $photo->id;
        $user->update(['photo_id'=>$user->photo_id]);
        }
        if ($user->role_id == 3){
            return redirect('admin');
        }

        return redirect('admin/users');
    }


    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show',compact('user'));
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::get();
        return view('admin.users.edit',compact('user','roles'));
        //
    }


    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);


        if (trim($request->password) == ''){
            $request->except('password');
        }else{
            $user->password = bcrypt($request->password);
        }

        if ($request->hasFile('photo_id')){
            $file = $request->file('photo_id');
            $name = $file->getClientOriginalName();
            $path = $file->move('images',$name);

            if ($user->photo){
                unlink(public_path().$user->photo->file);
                $user->photo->path=$path ;
                $user->photo->save();
            }else{
                $user->photo()->save(Photo::make(['path'=>'images/'.$name]));
            }

        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;

            $this->authorize('update',$user);

        $user->save();

        return redirect('admin/users');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        unlink(public_path().$user->photo->file);
        $user->delete();
        return redirect('/admin/users');
    }
}

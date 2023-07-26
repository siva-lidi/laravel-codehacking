<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\Photo;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.index',['users'=>User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles=Role::all();
        return view('admin.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsersRequest $request)
    {
        $inputs=$request->all();
        if ($request->hasFile('photo_id')) {
            $file=$request->file('photo_id');
            $name=time().'-'.$file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
            $filePath=$file->storeAs('Photos',$name,'public');
            $path='/storage/'.$filePath;
            $photo=Photo::create(['file'=>$path]);
            $inputs['photo_id']=$photo->id;
        } 
        User::create($inputs);        

        session()->flash('user-created','User Created Successfully');
        return redirect()->route('users.index');
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
        //
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

<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsCreateRequest;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::all();
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.post.create',compact('categories'));
    }
    public function store(PostsCreateRequest $request)
    {
        $user=Auth::user();
        $inputs=$request->all();
        if ($request->hasFile('photo_id')) {
            $file=$request->file('photo_id');
            $name=time().'-'.$file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
            $path=$file->storeAs('Photos',$name,'public');
            $filePath='/storage/'.$path;
            $photo=Photo::create(['file'=>$filePath]);
            $inputs['photo_id']=$photo->id;
        }
        $user->posts()->create($inputs);
        session()->flash('post-created','Post created successfuly');
        return redirect()->route('posts.index');
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

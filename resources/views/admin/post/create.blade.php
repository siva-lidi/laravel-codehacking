@extends('layouts.admin')
@section('content')
<h1>Create Post</h1>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter the Title">
                    @error('title')
                        <span class="text-danger"><strong>{{$message}}</strong></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-select form-control">
                        <option value="0" selected>Choose Option</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Photo_id">Photo</label>
                    <input type="file" class="form-control" name="photo_id" id="photo_id">
                    @error('photo_id')
                    <span class="text-danger"><strong>{{$message}}</strong></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="body">Description</label>
                    <textarea name="body" id="body" class="form-control" placeholder="Enter the Description" ></textarea>
                    @error('body')
                    <span class="text-danger"><strong>{{$message}}</strong></span>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit">Create</button>
            </form>
        </div>
    </div>
</div>

    
@endsection
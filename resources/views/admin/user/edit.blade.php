@extends('layouts.admin')
@section('content')
    <h1 class="mt-0">Edit Users</h1>

    <div class="row">
        <div class="col-sm-3">
            <img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" class="img-responsive img-rounded img-fluid" alt="">
        </div>
        <div class="col-sm-8">
            <form method="POST" action="{{route('users.update',$user->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" >
                    @error('name')
                        <span class="text-danger"><strong>{{$message}}</strong></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" >
                    @error('email')
                    <span class="text-danger"><strong>{{$message}}</strong></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="photo_id" class="form-label">Photo</label>
                    <input type="file" class="form-control" name="photo_id" id="photo_id">
                    @error('photo_id')
                    <span class="text-danger"><strong>{{$message}}</strong></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="role_id">Role</label>
                    <select name="role_id" id="role_id" class="form-select form-control">
                        <option selected>Choose Options</option>
                        @foreach ($roles as $role)
                        <option value="{{$role->id}}" @if ($user->role_id==$role->id) Selected @endif >{{$role->name}}</option>
                        @endforeach
                    </select>
                    @error('role_id')
                    <span class="text-danger"><strong>{{$message}}</strong></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="is_active">Status</label>
                    <select name="is_active" id="is_active" class="form-control">
                        <option value="1" @if ($user->is_active == 1) selected @endif>Active</option>
                        <option value="0" @if($user->is_active == 0) selected @endif>Not Active</option>
                    </select>
                    @error('is_active')
                    <span class="text-danger"><strong>{{$message}}</strong></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" id="password" placeholder="Enter the Password" >
                    @error('password')
                    <span class="text-danger"><strong>{{$message}}</strong></span>
                    @enderror
                </div>
                <button class="btn btn-primary col-sm-2" type="submit" >Update</button>
            </form>
            <form method="POST" action="{{route('users.destroy',$user->id)}}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger col-sm-2" type="submit">Delete</button>
            </form>
        </div>
    </div>
@endsection
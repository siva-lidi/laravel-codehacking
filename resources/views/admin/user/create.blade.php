@extends('layouts.admin')
@section('content')
    <h1 class="mt-0">Create Users</h1>

    <div class="row">
        <div class="col-sm-8">
            <form method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter the Name" >
                    @error('name')
                        <span class="text-danger"><strong>{{$message}}</strong></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter the Email" >
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
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                    @error('role_id')
                    <span class="text-danger"><strong>{{$message}}</strong></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="is_active">Status</label>
                    <select name="is_active" id="is_active" class="form-control">
                        <option value="1">Active</option>
                        <option value="0" selected="selected">Not Active</option>
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
                <button class="btn btn-primary" type="submit" >Create</button>
            </form>
        </div>
    </div>
@endsection
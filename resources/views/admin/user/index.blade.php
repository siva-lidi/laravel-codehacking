@extends('layouts.admin')
@section('content')
<h1>Hello User</h1>
@if (session('user-created'))
<div class="alert alert-success">{{session('user-created')}}</div>
@endif
<div class="row">
<div class="col-sm-12">
    <div class="table-responsive">
<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Active</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{Str::ucfirst($user->role->name)}}</td>
            <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
    </div>
</div>
</div>
@endsection

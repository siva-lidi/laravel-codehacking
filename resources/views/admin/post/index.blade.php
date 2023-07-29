@extends('layouts.admin')
@section('content')

@if (session('post-created'))
    <div class="alert alert-success">{{session('post-created')}}</div>
@endif
    <h1>Posts</h1>

    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Photo</th>
                            <th>Owner</th>
                            <th>category Id</th>
                            <th>Title</th>
                            <th>content</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>
                                    <img width="80px" height="50px" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}">
                                </td>
                                <td>{{$post->user->name}}</td>
                                <td>{{$post->category ? $post->category->name : 'UnCategorized'}}</td>
                                <td><a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></td>
                                <td>{{$post->body}}</td>
                                <td>{{$post->created_at->diffForHumans()}}</td>
                                <td>{{$post->updated_at->diffForHumans()}}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
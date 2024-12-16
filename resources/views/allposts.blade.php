@extends('layout')
@section('title')
All Posts Data
@endsection

@section('content')
<div class="row">
    <div class="col-6 mt-5">
        <a href="{{route('posts.create')}}" class="btn btn-success"> Add New Post</a>

    </div>
    <div class="col-6 mt-5">
        <form action="{{ route('posts.search') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Search post" value="">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>


<table class="table table-striped table-bordered mt-3">
    <thead>
        <tr>
            <th>id</th>
            <th>Post Name</th>
            <th>Post Content</th>
            <th>View Post</th>
            <th>Delete Post</th>
            <th>Update Post</th>
        </tr>
    <tbody>
        @foreach ($posts as $post)


        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->description}}</td>
            <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary btn-sm">View</a></td>

            <td>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>

            <td><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Update</a></td>
        </tr>
        @endforeach
    </tbody>
    </thead>
</table>

@endsection
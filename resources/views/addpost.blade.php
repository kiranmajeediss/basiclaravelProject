@extends('layout')

@section('title')
Add New Post
@endsection

@section('content')

<form method="POST" action="{{route('posts.store')}}">
    @csrf
    <div class="row mt-5">
        <label for="postTitle">Post Title</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="postTitle" name="postTitle">
        </div>
    </div>
    <div class="row mb-1">
        <label for="postBody">Post Description</label>
        <div class="col-sm-12">
            <textarea name="postBody" id="postBody" cols="20" rows="3" class="form-control"></textarea>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Submit</button>
    <a href="{{route('posts.index')}}" type="submit" class="btn btn-secondary mt-3">Back</a>
</form>
@endsection
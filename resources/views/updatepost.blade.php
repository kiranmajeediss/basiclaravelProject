@extends('layout')

@section('title')
Update Post
@endsection

@section('content')
<form method="POST" action="{{route('posts.update', $post->id)}}">
    @csrf
    @method('PUT')
    <div class="row mt-5">
        <label for="postTitle">Post Title</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="postTitle" name="postTitle" value="{{$post->title}}">
        </div>
    </div>
    <div class="row mb-1">
        <label for="postBody">Post Description</label>
        <div class="col-sm-12">
            <textarea name="postBody" id="" cols="20" rows="3" class="form-control">{{$post->description}}</textarea>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Submit</button>
    <a href="{{route('posts.index')}}" class="btn btn-secondary mt-3">Back</a>
</form>
@endsection
@extends('layout')

@section('title')
View Single Post
@endsection
@section('content')
<div class="row border mt-3">
    <div class="row mt-5">
        <h4>Post Title</h4>
        <div class="col-sm-12">
            <p>{{$post->title}}</p>
        </div>
    </div>
    <div class="row mb-1 ">
        <h4>Post Description</h4>
        <div class="col-sm-12">
            <p>
                {{$post->description}}
            </p>
        </div>
    </div>
</div>
<a href="{{route('posts.index')}}" class="btn btn-secondary mt-3">Back</a>
@endsection
@extends('layouts.app')

@section('content')

@if($errors->any())

<ul class="list-group">
    @foreach($errors->all() as $error)
    <li class="list-group-item text-danger">
        {{ $error }}
    </li>
    @endforeach
</ul>

@endif

<div class="card">
    <div class="card-header">
        Create a new post
    </div>
    <div class="card-body">
        <form action="{{ url('/admin/posts') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="featured">Featured image</label>
                <input type="file" id="featured" name="featured" class="form-control">
            </div>
            <div class="form-group">
                <label for="category_id">Select a Category</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select tags</label>
                @foreach ($tags as $tag)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}">
                        <label class="form-check-label" for="{{ $tag->id }}">
                            {{ $tag->tag }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Store post</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#content').summernote();
        });
    </script>
@endsection

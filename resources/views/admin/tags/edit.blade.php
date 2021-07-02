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
            Update tag: {{ $tag->tag }}
        </div>
        <div class="card-body">
            <form action="{{ url('/admin/tags/' . $tag->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="tag">Tag</label>
                    <input type="text" id="tag" name="tag" class="form-control" value="{{ $tag->tag }}">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update tag</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

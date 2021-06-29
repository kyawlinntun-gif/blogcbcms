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
            Update category: {{ $category->name }}
        </div>
        <div class="card-body">
            <form action="{{ url('/admin/categories/' . $category->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ $category->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

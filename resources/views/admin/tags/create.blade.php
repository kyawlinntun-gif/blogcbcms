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
            Create a new tag
        </div>
        <div class="card-body">
            <form action="{{ url('/admin/tags') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tag">Tag</label>
                    <input type="text" id="tag" name="tag" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Store tag</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

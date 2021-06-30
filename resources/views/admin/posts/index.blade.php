@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Trash</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td><img src="{{ $post->featured }}" alt="{{ $post->title }}" width="90px;" height="50px;"></td>
                            <td>{{ $post->title }}</td>
                            <td>
                                <a href="#" class="btn btn-xs btn-primary">Edit</a>
                            </td>
                            <td>
                                <button class="btn btn-xs btn-danger" onclick="deleteTrash({{ $post->id }})">Trash</button>
                                <form action="{{ url('/admin/posts/'. $post->id) }}" method="POST" id="deleteTrash{{ $post->id }}" style="display: none;">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('js')

    <script>
        function deleteTrash(id)
        {
            event.preventDefault();
            document.getElementById('deleteTrash'+id).submit();
        }
    </script>

@endsection

@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            Trashed Posts
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Restore</th>
                        <th>Destroy</th>
                    </tr>
                </thead>
                <tbody>
                    @if($posts->count() > 0)
                        @foreach ($posts as $post)
                            <tr>
                                <td><img src="{{ $post->featured }}" alt="{{ $post->title }}" width="90px;" height="50px;"></td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    <a href="#" class="btn btn-xs btn-primary">Edit</a>
                                </td>
                                <td>
                                    <button class="btn btn-xs btn-success" onclick="restorePost({{ $post->id }})">Restore</button>
                                    <form action="{{ url('/admin/posts/restore/' . $post->id) }}" method="POST" id="restorePost{{ $post->id }}" style="display: none;">
                                        @csrf
                                    </form>
                                </td>
                                <td>
                                    <button class="btn btn-xs btn-danger" onclick="deletePermanetly({{ $post->id }})">Delete</button>
                                    <form action="{{ url('/admin/posts/trash/'. $post->id) }}" method="POST" id="deletePermanetly{{ $post->id }}" style="display: none;">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">No trashed post.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('js')

    <script>
        function deletePermanetly(id)
        {
            event.preventDefault();
            document.getElementById('deletePermanetly'+id).submit();
        }
        function restorePost(id)
        {
            event.preventDefault();
            document.getElementById('restorePost'+id).submit();
        }
    </script>

@endsection
